/**
 * CV Builder – Main Application JS
 * Vanilla JS, no frameworks. Uses html2canvas + jsPDF for exports.
 */
(function () {
    'use strict';

    // Abort if our data object isn't available.
    if (typeof cvbData === 'undefined') return;

    // ------------------------------------------------------------------
    // State
    // ------------------------------------------------------------------
    const state = {
        currentStep: 1,
        totalSteps: 6,
        templateId: 'classic',
        cvId: null,
        token: localStorage.getItem('cvb_token') || null,
        data: {
            personal: { first_name: '', last_name: '', email: '', phone: '', date_of_birth: '', address: '', photo_url: '', job_title: '', summary: '', linkedin: '', website: '' },
            experience: [],
            education: [],
            skills: { hard: [], soft: [], languages: [] },
            interests: [],
            rodo: true,
        },
        saving: false,
        exporting: false,
    };

    // ------------------------------------------------------------------
    // DOM references
    // ------------------------------------------------------------------
    const app = document.getElementById('cvb-app');
    if (!app) return;

    const toastsContainer = document.getElementById('cvb-toasts');

    // ------------------------------------------------------------------
    // Helpers
    // ------------------------------------------------------------------
    function $(sel, ctx) { return (ctx || document).querySelector(sel); }
    function $$(sel, ctx) { return [...(ctx || document).querySelectorAll(sel)]; }

    function rest(endpoint, options = {}) {
        const { method = 'GET', body } = options;
        const headers = {
            'X-WP-Nonce': cvbData.nonce,
            'Content-Type': 'application/json',
        };
        if (state.token) {
            headers['X-Cvb-Token'] = state.token;
        }

        return fetch(cvbData.restUrl + endpoint, {
            method,
            headers,
            body: body ? JSON.stringify(body) : undefined,
            credentials: 'same-origin',
        }).then(async (res) => {
            const json = await res.json();
            if (!res.ok) throw new Error(json.error || json.message || 'Błąd serwera');
            return json;
        });
    }

    function toast(message, type = 'info') {
        const el = document.createElement('div');
        el.className = 'cvb-toast cvb-toast--' + type;
        el.textContent = message;
        toastsContainer.appendChild(el);

        setTimeout(() => {
            el.classList.add('is-hiding');
            setTimeout(() => el.remove(), 300);
        }, 4000);
    }

    function escapeHtml(str) {
        const div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }

    // ------------------------------------------------------------------
    // Token management (anonymous users)
    // ------------------------------------------------------------------
    async function ensureToken() {
        if (cvbData.isLoggedIn || state.token) return;

        try {
            const res = await rest('token', { method: 'POST' });
            state.token = res.token;
            localStorage.setItem('cvb_token', res.token);
        } catch (e) {
            console.error('Token generation failed:', e);
        }
    }

    // ------------------------------------------------------------------
    // Step Navigation
    // ------------------------------------------------------------------
    function goToStep(step) {
        if (step < 1 || step > state.totalSteps) return;

        // Collect data from current step before leaving.
        collectCurrentStepData();

        // Auto-save on step change.
        autoSave();

        state.currentStep = step;
        updateStepUI();

        // If going to preview, render CV.
        if (step === state.totalSteps) {
            renderPreview();
        }
    }

    function updateStepUI() {
        const step = state.currentStep;

        // Show/hide sections.
        $$('[data-step-content]', app).forEach((sec) => {
            sec.style.display = parseInt(sec.dataset.stepContent) === step ? '' : 'none';
        });

        // Update step indicators.
        $$('.cvb-steps__item', app).forEach((item) => {
            const s = parseInt(item.dataset.step);
            item.classList.remove('is-active', 'is-completed');
            if (s === step) item.classList.add('is-active');
            else if (s < step) item.classList.add('is-completed');
        });

        // Navigation buttons.
        const prevBtn = $('[data-action="prev-step"]', app);
        const nextBtn = $('[data-action="next-step"]', app);

        prevBtn.style.display = step === 1 ? 'none' : '';
        nextBtn.textContent = step === state.totalSteps ? 'Zapisz CV' : 'Dalej';

        if (step < state.totalSteps) {
            nextBtn.innerHTML = 'Dalej <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>';
        } else {
            nextBtn.innerHTML = '<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg> Zapisz CV';
        }

        // Scroll to top of app.
        app.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    // ------------------------------------------------------------------
    // Data collection from forms
    // ------------------------------------------------------------------
    function collectCurrentStepData() {
        switch (state.currentStep) {
            case 1:
                // Template selection.
                const checked = $('input[name="cvb_template"]:checked', app);
                if (checked) state.templateId = checked.value;
                break;

            case 2:
                collectPersonalData();
                break;

            case 3:
                collectExperienceData();
                break;

            case 4:
                collectEducationData();
                break;

            case 5:
                collectSkillsData();
                break;
        }
    }

    function collectPersonalData() {
        const fields = ['first_name', 'last_name', 'email', 'phone', 'job_title', 'date_of_birth', 'address', 'linkedin', 'website', 'summary'];
        fields.forEach((field) => {
            const input = $(`[name="${field}"]`, app);
            if (input) state.data.personal[field] = input.value.trim();
        });
    }

    function collectExperienceData() {
        state.data.experience = [];
        $$('#cvb-experience-list .cvb-repeater-item', app).forEach((item) => {
            state.data.experience.push({
                company: ($('[name="exp_company"]', item) || {}).value || '',
                position: ($('[name="exp_position"]', item) || {}).value || '',
                start_date: ($('[name="exp_start"]', item) || {}).value || '',
                end_date: ($('[name="exp_end"]', item) || {}).value || '',
                current: ($('[name="exp_current"]', item) || {}).checked || false,
                description: ($('[name="exp_description"]', item) || {}).value || '',
            });
        });
    }

    function collectEducationData() {
        state.data.education = [];
        $$('#cvb-education-list .cvb-repeater-item', app).forEach((item) => {
            state.data.education.push({
                school: ($('[name="edu_school"]', item) || {}).value || '',
                degree: ($('[name="edu_degree"]', item) || {}).value || '',
                field: ($('[name="edu_field"]', item) || {}).value || '',
                start_date: ($('[name="edu_start"]', item) || {}).value || '',
                end_date: ($('[name="edu_end"]', item) || {}).value || '',
            });
        });
    }

    function collectSkillsData() {
        // Hard skills, soft skills, interests are managed through tags.
        // Languages through repeater items.
        state.data.skills.languages = [];
        $$('#cvb-languages-list .cvb-language-item').forEach((item) => {
            state.data.skills.languages.push({
                name: ($('[name="lang_name"]', item) || {}).value || '',
                level: ($('[name="lang_level"]', item) || {}).value || '',
            });
        });
    }

    // ------------------------------------------------------------------
    // Auto-save
    // ------------------------------------------------------------------
    let saveTimeout = null;

    function autoSave() {
        if (saveTimeout) clearTimeout(saveTimeout);
        saveTimeout = setTimeout(doSave, 1500);
    }

    async function doSave() {
        if (state.saving) return;
        state.saving = true;

        try {
            await ensureToken();

            const res = await rest('cv', {
                method: 'POST',
                body: {
                    data: state.data,
                    template_id: state.templateId,
                    cv_id: state.cvId || 0,
                },
            });

            if (res.cv_id) {
                state.cvId = res.cv_id;
            }
        } catch (e) {
            console.error('Auto-save failed:', e);
        } finally {
            state.saving = false;
        }
    }

    // ------------------------------------------------------------------
    // Repeater: Experience
    // ------------------------------------------------------------------
    function addExperienceItem(data = {}) {
        const list = $('#cvb-experience-list', app);
        const idx = list.children.length + 1;

        const item = document.createElement('div');
        item.className = 'cvb-repeater-item';
        item.innerHTML = `
            <div class="cvb-repeater-item__header">
                <span class="cvb-repeater-item__title">Doświadczenie #${idx}</span>
                <button type="button" class="cvb-repeater-item__remove" data-action="remove-item">Usuń</button>
            </div>
            <div class="cvb-form__row">
                <div class="cvb-form__group">
                    <label class="cvb-label">Firma</label>
                    <input type="text" name="exp_company" class="cvb-input" value="${escapeHtml(data.company || '')}" placeholder="Nazwa firmy" />
                </div>
                <div class="cvb-form__group">
                    <label class="cvb-label">Stanowisko</label>
                    <input type="text" name="exp_position" class="cvb-input" value="${escapeHtml(data.position || '')}" placeholder="np. Frontend Developer" />
                </div>
            </div>
            <div class="cvb-form__row">
                <div class="cvb-form__group">
                    <label class="cvb-label">Od</label>
                    <input type="month" name="exp_start" class="cvb-input" value="${escapeHtml(data.start_date || '')}" />
                </div>
                <div class="cvb-form__group">
                    <label class="cvb-label">Do</label>
                    <input type="month" name="exp_end" class="cvb-input" value="${escapeHtml(data.end_date || '')}" ${data.current ? 'disabled' : ''} />
                    <label class="cvb-checkbox" style="margin-top:0.5rem;">
                        <input type="checkbox" name="exp_current" ${data.current ? 'checked' : ''} />
                        <span>Aktualnie pracuję</span>
                    </label>
                </div>
            </div>
            <div class="cvb-form__group">
                <label class="cvb-label">Opis obowiązków</label>
                <textarea name="exp_description" class="cvb-textarea" rows="3" placeholder="Opisz swoje główne obowiązki...">${escapeHtml(data.description || '')}</textarea>
            </div>
        `;

        // Toggle end date on "current" checkbox change.
        const currentCheckbox = $('[name="exp_current"]', item);
        const endInput = $('[name="exp_end"]', item);
        currentCheckbox.addEventListener('change', () => {
            endInput.disabled = currentCheckbox.checked;
            if (currentCheckbox.checked) endInput.value = '';
        });

        // Remove button.
        $('[data-action="remove-item"]', item).addEventListener('click', () => {
            item.style.opacity = '0';
            item.style.transform = 'translateY(-10px)';
            item.style.transition = 'all 0.2s ease';
            setTimeout(() => item.remove(), 200);
        });

        list.appendChild(item);
    }

    // ------------------------------------------------------------------
    // Repeater: Education
    // ------------------------------------------------------------------
    function addEducationItem(data = {}) {
        const list = $('#cvb-education-list', app);
        const idx = list.children.length + 1;

        const item = document.createElement('div');
        item.className = 'cvb-repeater-item';
        item.innerHTML = `
            <div class="cvb-repeater-item__header">
                <span class="cvb-repeater-item__title">Wykształcenie #${idx}</span>
                <button type="button" class="cvb-repeater-item__remove" data-action="remove-item">Usuń</button>
            </div>
            <div class="cvb-form__row">
                <div class="cvb-form__group">
                    <label class="cvb-label">Uczelnia / Szkoła</label>
                    <input type="text" name="edu_school" class="cvb-input" value="${escapeHtml(data.school || '')}" placeholder="Nazwa uczelni" />
                </div>
                <div class="cvb-form__group">
                    <label class="cvb-label">Kierunek</label>
                    <input type="text" name="edu_field" class="cvb-input" value="${escapeHtml(data.field || '')}" placeholder="np. Informatyka" />
                </div>
            </div>
            <div class="cvb-form__row">
                <div class="cvb-form__group">
                    <label class="cvb-label">Stopień</label>
                    <select name="edu_degree" class="cvb-select">
                        <option value="">Wybierz...</option>
                        <option value="podstawowe" ${data.degree === 'podstawowe' ? 'selected' : ''}>Podstawowe</option>
                        <option value="zawodowe" ${data.degree === 'zawodowe' ? 'selected' : ''}>Zawodowe</option>
                        <option value="srednie" ${data.degree === 'srednie' ? 'selected' : ''}>Średnie</option>
                        <option value="licencjat" ${data.degree === 'licencjat' ? 'selected' : ''}>Licencjat</option>
                        <option value="inzynier" ${data.degree === 'inzynier' ? 'selected' : ''}>Inżynier</option>
                        <option value="magister" ${data.degree === 'magister' ? 'selected' : ''}>Magister</option>
                        <option value="doktor" ${data.degree === 'doktor' ? 'selected' : ''}>Doktor</option>
                    </select>
                </div>
                <div class="cvb-form__group">
                    <label class="cvb-label">Lata</label>
                    <div style="display:flex;gap:0.5rem;align-items:center;">
                        <input type="number" name="edu_start" class="cvb-input" value="${escapeHtml(data.start_date || '')}" placeholder="2018" min="1950" max="2030" />
                        <span>–</span>
                        <input type="number" name="edu_end" class="cvb-input" value="${escapeHtml(data.end_date || '')}" placeholder="2022" min="1950" max="2030" />
                    </div>
                </div>
            </div>
        `;

        $('[data-action="remove-item"]', item).addEventListener('click', () => {
            item.style.opacity = '0';
            item.style.transform = 'translateY(-10px)';
            item.style.transition = 'all 0.2s ease';
            setTimeout(() => item.remove(), 200);
        });

        list.appendChild(item);
    }

    // ------------------------------------------------------------------
    // Repeater: Languages
    // ------------------------------------------------------------------
    function addLanguageItem(data = {}) {
        const list = $('#cvb-languages-list');
        const item = document.createElement('div');
        item.className = 'cvb-language-item';
        item.innerHTML = `
            <div class="cvb-form__group" style="margin-bottom:0;">
                <input type="text" name="lang_name" class="cvb-input" value="${escapeHtml(data.name || '')}" placeholder="np. Angielski" />
            </div>
            <div class="cvb-form__group" style="margin-bottom:0;">
                <select name="lang_level" class="cvb-select">
                    <option value="A1" ${data.level === 'A1' ? 'selected' : ''}>A1 – Początkujący</option>
                    <option value="A2" ${data.level === 'A2' ? 'selected' : ''}>A2 – Podstawowy</option>
                    <option value="B1" ${data.level === 'B1' ? 'selected' : ''}>B1 – Średniozaaw.</option>
                    <option value="B2" ${data.level === 'B2' ? 'selected' : ''}>B2 – Zaawansowany</option>
                    <option value="C1" ${data.level === 'C1' ? 'selected' : ''}>C1 – Biegły</option>
                    <option value="C2" ${data.level === 'C2' ? 'selected' : ''}>C2 – Ojczysty/Biegły</option>
                    <option value="native" ${data.level === 'native' ? 'selected' : ''}>Ojczysty</option>
                </select>
            </div>
            <button type="button" class="cvb-btn cvb-btn--ghost cvb-btn--sm" data-action="remove-item" style="color:var(--cvb-danger);">Usuń</button>
        `;

        $('[data-action="remove-item"]', item).addEventListener('click', () => {
            item.remove();
        });

        list.appendChild(item);
    }

    // ------------------------------------------------------------------
    // Tags Input
    // ------------------------------------------------------------------
    function initTagsInput(containerId, stateKey) {
        const container = document.getElementById(containerId);
        if (!container) return;

        const input = $('.cvb-tags-input__field', container);
        const tagsEl = $('.cvb-tags-input__tags', container);

        function renderTags() {
            let arr;
            if (stateKey === 'interests') {
                arr = state.data.interests;
            } else {
                arr = state.data.skills[stateKey];
            }

            tagsEl.innerHTML = arr.map((tag, i) => `
                <span class="cvb-tag">
                    ${escapeHtml(tag)}
                    <button type="button" class="cvb-tag__remove" data-index="${i}">&times;</button>
                </span>
            `).join('');

            // Remove handlers.
            $$('.cvb-tag__remove', tagsEl).forEach((btn) => {
                btn.addEventListener('click', () => {
                    const idx = parseInt(btn.dataset.index);
                    if (stateKey === 'interests') {
                        state.data.interests.splice(idx, 1);
                    } else {
                        state.data.skills[stateKey].splice(idx, 1);
                    }
                    renderTags();
                });
            });
        }

        input.addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                const val = input.value.trim();
                if (!val) return;

                if (stateKey === 'interests') {
                    state.data.interests.push(val);
                } else {
                    state.data.skills[stateKey].push(val);
                }

                input.value = '';
                renderTags();
            }
        });

        renderTags();
    }

    // ------------------------------------------------------------------
    // Photo Upload
    // ------------------------------------------------------------------
    function initPhotoUpload() {
        const fileInput = $('#cvb-photo', app);
        const preview = $('#cvb-photo-preview', app);
        if (!fileInput || !preview) return;

        fileInput.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (!file) return;

            if (file.size > 5 * 1024 * 1024) {
                toast('Zdjęcie jest zbyt duże (max 5 MB).', 'error');
                return;
            }

            const reader = new FileReader();
            reader.onload = (ev) => {
                state.data.personal.photo_url = ev.target.result;
                preview.innerHTML = `<img src="${ev.target.result}" alt="Zdjęcie profilowe" />`;
            };
            reader.readAsDataURL(file);
        });
    }

    // ------------------------------------------------------------------
    // CV Preview rendering
    // ------------------------------------------------------------------
    async function renderPreview() {
        const container = $('#cvb-preview-cv', app);
        container.innerHTML = '<div style="display:flex;align-items:center;justify-content:center;min-height:400px;"><div class="cvb-spinner" style="border-color:var(--cvb-gray-300);border-top-color:var(--cvb-primary);width:32px;height:32px;"></div></div>';

        try {
            collectCurrentStepData();
            const res = await rest('cv/render', {
                method: 'POST',
                body: {
                    data: state.data,
                    template_id: state.templateId,
                },
            });

            container.innerHTML = res.html;
        } catch (e) {
            container.innerHTML = '<p style="padding:2rem;color:var(--cvb-danger);">Nie udało się wygenerować podglądu. ' + escapeHtml(e.message) + '</p>';
        }
    }

    // ------------------------------------------------------------------
    // Export (PDF, JPG, PNG) – with paywall check
    // ------------------------------------------------------------------
    async function handleExport(format) {
        // Check access.
        try {
            const access = await rest('access/status');
            if (!access.has_access) {
                showPaywallModal();
                return;
            }
        } catch (e) {
            showPaywallModal();
            return;
        }

        if (state.exporting) return;
        state.exporting = true;

        const previewEl = $('#cvb-preview-cv', app);
        if (!previewEl || !previewEl.innerHTML.trim()) {
            toast('Najpierw wygeneruj podgląd CV.', 'warning');
            state.exporting = false;
            return;
        }

        toast(cvbData.i18n.downloading, 'info');

        try {
            const canvas = await html2canvas(previewEl, {
                scale: 2,
                useCORS: true,
                logging: false,
                backgroundColor: '#ffffff',
            });

            const name = (state.data.personal.first_name + '-' + state.data.personal.last_name).replace(/\s+/g, '-') || 'CV';

            if (format === 'png') {
                downloadDataUrl(canvas.toDataURL('image/png'), name + '.png');
            } else if (format === 'jpg') {
                downloadDataUrl(canvas.toDataURL('image/jpeg', 0.95), name + '.jpg');
            } else {
                // PDF via jsPDF.
                const { jsPDF } = window.jspdf;
                const imgData = canvas.toDataURL('image/jpeg', 0.95);
                const pdf = new jsPDF({
                    orientation: 'portrait',
                    unit: 'mm',
                    format: 'a4',
                });

                const pageWidth = pdf.internal.pageSize.getWidth();
                const pageHeight = pdf.internal.pageSize.getHeight();
                const imgWidth = pageWidth;
                const imgHeight = (canvas.height * imgWidth) / canvas.width;

                let heightLeft = imgHeight;
                let position = 0;

                pdf.addImage(imgData, 'JPEG', 0, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;

                while (heightLeft > 0) {
                    position = heightLeft - imgHeight;
                    pdf.addPage();
                    pdf.addImage(imgData, 'JPEG', 0, position, imgWidth, imgHeight);
                    heightLeft -= pageHeight;
                }

                pdf.save(name + '.pdf');
            }

            toast('Plik pobrany!', 'success');
        } catch (e) {
            toast('Błąd eksportu: ' + e.message, 'error');
        } finally {
            state.exporting = false;
        }
    }

    function downloadDataUrl(dataUrl, filename) {
        const a = document.createElement('a');
        a.href = dataUrl;
        a.download = filename;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    }

    // ------------------------------------------------------------------
    // Paywall Modal
    // ------------------------------------------------------------------
    function showPaywallModal() {
        const modal = $('#cvb-paywall-modal', app);
        if (modal) modal.style.display = '';
    }

    function hideModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) modal.style.display = 'none';
    }

    // ------------------------------------------------------------------
    // Payment
    // ------------------------------------------------------------------
    async function handlePayment(e) {
        e.preventDefault();

        const emailInput = $('#cvb-payment-email', app);
        const email = emailInput ? emailInput.value.trim() : '';

        if (!cvbData.isLoggedIn && (!email || !email.includes('@'))) {
            toast('Podaj prawidłowy adres e-mail.', 'error');
            return;
        }

        const submitBtn = $('[type="submit"]', e.target);
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="cvb-spinner"></span> Przekierowywanie...';

        try {
            // Save CV before payment.
            collectCurrentStepData();
            await doSave();

            const res = await rest('payment/create', {
                method: 'POST',
                body: {
                    email: email,
                    cv_id: state.cvId,
                },
            });

            if (res.checkout_url) {
                window.location.href = res.checkout_url;
            }
        } catch (e) {
            toast('Błąd płatności: ' + e.message, 'error');
            submitBtn.disabled = false;
            submitBtn.innerHTML = 'Zapłać ' + cvbData.i18n?.price || '29,00 zł';
        }
    }

    // ------------------------------------------------------------------
    // Social Auth
    // ------------------------------------------------------------------
    async function handleSocialAuth(provider) {
        try {
            const res = await rest('auth/' + provider);
            if (res.redirect_url) {
                window.location.href = res.redirect_url;
            }
        } catch (e) {
            toast('Logowanie ' + provider + ' nie jest dostępne: ' + e.message, 'error');
        }
    }

    // ------------------------------------------------------------------
    // URL Params handling (payment return, auth return)
    // ------------------------------------------------------------------
    function handleUrlParams() {
        const params = new URLSearchParams(window.location.search);

        if (params.get('cv-payment') === 'success') {
            toast(cvbData.i18n.paymentOk, 'success');
            // Clean URL.
            window.history.replaceState({}, '', window.location.pathname);
        }

        if (params.get('cv-payment') === 'cancel') {
            toast('Płatność anulowana.', 'warning');
            window.history.replaceState({}, '', window.location.pathname);
        }

        if (params.get('cvb_auth_success')) {
            toast('Zalogowano przez ' + params.get('cvb_auth_success') + '!', 'success');
            window.history.replaceState({}, '', window.location.pathname);
        }

        if (params.get('cvb_auth_error')) {
            toast('Błąd logowania: ' + params.get('cvb_auth_error'), 'error');
            window.history.replaceState({}, '', window.location.pathname);
        }
    }

    // ------------------------------------------------------------------
    // Template preview mini-renders
    // ------------------------------------------------------------------
    function renderTemplatePreviews() {
        const colors = {
            classic: { bg: '#3b2a1a', accent: '#f0b527' },
            modern: { bg: '#1e40af', accent: '#3b82f6' },
            creative: { bg: '#7c3aed', accent: '#a78bfa' },
            minimal: { bg: '#f9fafb', accent: '#374151' },
            professional: { bg: '#1f2937', accent: '#6b7280' },
            executive: { bg: '#44403c', accent: '#a8a29e' },
            tech: { bg: '#0f172a', accent: '#38bdf8' },
            academic: { bg: '#1e3a5f', accent: '#60a5fa' },
            bold: { bg: '#dc2626', accent: '#fca5a5' },
            nordic: { bg: '#f0fdf4', accent: '#22c55e' },
        };

        $$('[data-template-preview]', app).forEach((el) => {
            const id = el.dataset.templatePreview;
            const c = colors[id] || { bg: '#e5e7eb', accent: '#6b7280' };
            el.innerHTML = `
                <div style="width:100%;height:100%;display:flex;flex-direction:column;">
                    <div style="background:${c.bg};height:35%;padding:8px;display:flex;align-items:center;gap:6px;">
                        <div style="width:24px;height:24px;border-radius:50%;background:${c.accent};"></div>
                        <div>
                            <div style="width:50px;height:5px;background:rgba(255,255,255,.7);border-radius:2px;margin-bottom:3px;"></div>
                            <div style="width:35px;height:3px;background:rgba(255,255,255,.4);border-radius:2px;"></div>
                        </div>
                    </div>
                    <div style="flex:1;padding:8px;">
                        <div style="width:70%;height:4px;background:#d1d5db;border-radius:2px;margin-bottom:6px;"></div>
                        <div style="width:90%;height:3px;background:#e5e7eb;border-radius:2px;margin-bottom:3px;"></div>
                        <div style="width:80%;height:3px;background:#e5e7eb;border-radius:2px;margin-bottom:6px;"></div>
                        <div style="width:50%;height:4px;background:${c.accent};border-radius:2px;margin-bottom:4px;"></div>
                        <div style="width:85%;height:3px;background:#e5e7eb;border-radius:2px;margin-bottom:3px;"></div>
                        <div style="width:75%;height:3px;background:#e5e7eb;border-radius:2px;"></div>
                    </div>
                </div>
            `;
        });
    }

    // ------------------------------------------------------------------
    // Load existing CV data
    // ------------------------------------------------------------------
    async function loadExistingCV() {
        if (!cvbData.isLoggedIn) return;

        try {
            const cvs = await rest('cvs');
            if (cvs.length > 0) {
                const latest = cvs[0];
                const full = await rest('cv/' + latest.id);
                if (full && full.data) {
                    state.cvId = full.id;
                    state.templateId = full.template_id;
                    state.data = { ...state.data, ...full.data };
                    populateFormsFromState();
                    toast('Załadowano Twoje ostatnie CV.', 'success');
                }
            }
        } catch (e) {
            // No existing CV – that's fine.
        }
    }

    function populateFormsFromState() {
        // Personal fields.
        const p = state.data.personal;
        Object.keys(p).forEach((key) => {
            const input = $(`[name="${key}"]`, app);
            if (input && p[key]) input.value = p[key];
        });

        // Photo.
        if (p.photo_url) {
            const preview = $('#cvb-photo-preview', app);
            if (preview) preview.innerHTML = `<img src="${p.photo_url}" alt="Zdjęcie" />`;
        }

        // Template.
        const templateRadio = $(`input[name="cvb_template"][value="${state.templateId}"]`, app);
        if (templateRadio) templateRadio.checked = true;

        // Template switch in preview.
        const templateSwitch = $('#cvb-template-switch', app);
        if (templateSwitch) templateSwitch.value = state.templateId;

        // Experience.
        state.data.experience.forEach((exp) => addExperienceItem(exp));

        // Education.
        state.data.education.forEach((edu) => addEducationItem(edu));

        // Languages.
        state.data.skills.languages.forEach((lang) => addLanguageItem(lang));
    }

    // ------------------------------------------------------------------
    // Event Delegation
    // ------------------------------------------------------------------
    function initEventListeners() {
        app.addEventListener('click', (e) => {
            const action = e.target.closest('[data-action]');
            if (!action) return;

            const act = action.dataset.action;

            switch (act) {
                case 'next-step':
                    if (state.currentStep < state.totalSteps) {
                        goToStep(state.currentStep + 1);
                    } else {
                        doSave().then(() => toast(cvbData.i18n.saved, 'success'));
                    }
                    break;

                case 'prev-step':
                    goToStep(state.currentStep - 1);
                    break;

                case 'add-experience':
                    addExperienceItem();
                    break;

                case 'add-education':
                    addEducationItem();
                    break;

                case 'add-language':
                    addLanguageItem();
                    break;

                case 'download':
                    handleExport(action.dataset.format || 'pdf');
                    break;

                case 'close-modal':
                    const modal = action.closest('.cvb-modal');
                    if (modal) modal.style.display = 'none';
                    break;

                case 'show-login':
                    const loginModal = $('#cvb-login-modal', app);
                    if (loginModal) loginModal.style.display = '';
                    break;

                case 'social-auth':
                    handleSocialAuth(action.dataset.provider);
                    break;
            }
        });

        // Step indicator clicks.
        $$('.cvb-steps__item', app).forEach((item) => {
            item.addEventListener('click', () => {
                const step = parseInt(item.dataset.step);
                if (step) goToStep(step);
            });
        });

        // Payment form.
        const payForm = $('#cvb-payment-form', app);
        if (payForm) payForm.addEventListener('submit', handlePayment);

        // Template switch in preview.
        const templateSwitch = $('#cvb-template-switch', app);
        if (templateSwitch) {
            templateSwitch.addEventListener('change', () => {
                state.templateId = templateSwitch.value;
                renderPreview();
            });
        }

        // RODO checkbox.
        const rodoCheckbox = $('#cvb-rodo', app);
        if (rodoCheckbox) {
            rodoCheckbox.addEventListener('change', () => {
                state.data.rodo = rodoCheckbox.checked;
            });
        }
    }

    // ------------------------------------------------------------------
    // Initialize
    // ------------------------------------------------------------------
    function init() {
        initEventListeners();
        initPhotoUpload();
        initTagsInput('cvb-hard-skills', 'hard');
        initTagsInput('cvb-soft-skills', 'soft');
        initTagsInput('cvb-interests', 'interests');
        renderTemplatePreviews();
        handleUrlParams();
        updateStepUI();
        loadExistingCV();
    }

    // Wait for DOM.
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
