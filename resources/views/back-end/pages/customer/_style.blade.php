<style>
    .customer-page .card { border: 1px solid #edf0f5; border-radius: 12px; box-shadow: 0 5px 18px rgba(18, 38, 63, .045); }
    .customer-stat { min-height: 94px; }
    .customer-stat .card-body { display: flex; align-items: center; justify-content: space-between; padding: 18px 20px; }
    .customer-stat-label { margin-bottom: 4px; color: #74788d; font-size: 12px; }
    .customer-stat-value { margin: 0; color: #2a3042; font-size: 21px; font-weight: 600; }
    .customer-stat-icon { width: 48px; height: 48px; display: grid; place-items: center; border-radius: 50%; font-size: 23px; }
    .customer-stat.primary .customer-stat-icon { color: #556ee6; background: rgba(85,110,230,.14); }
    .customer-stat.success .customer-stat-icon { color: #34c38f; background: rgba(52,195,143,.15); }
    .customer-stat.info .customer-stat-icon { color: #50a5f1; background: rgba(80,165,241,.15); }
    .customer-stat.warning .customer-stat-icon { color: #f1b44c; background: rgba(241,180,76,.18); }
    .customer-filter .form-label { margin-bottom: 7px; color: #495057; font-size: 12px; font-weight: 600; }
    .customer-filter .form-control, .customer-filter .form-select { min-height: 38px; font-size: 12px; }
    .customer-search { position: relative; }
    .customer-search i { position: absolute; top: 50%; left: 13px; color: #556ee6; transform: translateY(-50%); }
    .customer-search .form-control { padding-left: 36px; }
    .customer-table-title { margin-bottom: 3px; color: #2a3042; font-size: 15px; font-weight: 600; }
    .customer-table-subtitle { margin: 0; color: #74788d; font-size: 11px; }
    .customer-table thead th { padding: 13px 14px; border-bottom: 1px solid #dfe4ec; color: #2a3042; font-size: 11px; font-weight: 700; white-space: nowrap; }
    .customer-table tbody td { padding: 13px 14px; border-color: #edf0f5; color: #495057; font-size: 11px; vertical-align: middle; }
    .customer-code { color: #556ee6; font-weight: 700; }
    .customer-name { max-width: 250px; color: #2a3042; font-weight: 600; white-space: normal; }
    .customer-contact { color: #74788d; font-size: 10px; }
    .customer-action { width: 31px; height: 31px; display: inline-grid; place-items: center; border: 1px solid #dce2ea; border-radius: 6px; background: #fff; text-decoration: none; }
    .customer-action:hover { border-color: #aeb9ef; background: #f4f6ff; }
    .customer-status { cursor: pointer; }
    .customer-empty { padding: 56px 20px !important; color: #9aa1ae !important; text-align: center; }
    .customer-empty i { display: block; margin-bottom: 8px; font-size: 40px; }
    .customer-form-card .card-body { padding: 24px; }
    .customer-section-head { display: flex; align-items: center; gap: 12px; margin-bottom: 22px; padding-bottom: 16px; border-bottom: 1px solid #edf0f5; }
    .customer-section-icon { width: 40px; height: 40px; display: grid; flex: 0 0 40px; place-items: center; border-radius: 11px; color: #556ee6; background: rgba(85,110,230,.11); font-size: 20px; }
    .customer-section-head h4 { margin: 0 0 3px; color: #2a3042; font-size: 15px; }
    .customer-section-head p { margin: 0; color: #74788d; font-size: 11px; }
    .customer-form-card .form-label { color: #495057; font-size: 12px; font-weight: 600; }
    .customer-form-card .form-control, .customer-form-card .form-select { min-height: 39px; font-size: 12px; }
    .customer-form-card textarea.form-control { min-height: 84px; }
    .customer-side-card { position: sticky; top: 90px; }
    .customer-code-box { padding: 16px; border: 1px dashed #cdd5e5; border-radius: 10px; background: #f8f9fc; text-align: center; }
    .customer-code-box small { display: block; margin-bottom: 4px; color: #74788d; }
    .customer-code-box strong { color: #556ee6; font-size: 18px; letter-spacing: .04em; }
    .document-checklist { display: grid; gap: 13px; margin: 19px 0 0; }
    .document-check { display: flex; align-items: center; gap: 9px; color: #74788d; font-size: 11px; }
    .document-check i { width: 22px; height: 22px; display: grid; place-items: center; border-radius: 50%; color: #9aa1ae; background: #f1f3f7; }
    .document-check.is-ready { color: #495057; }
    .document-check.is-ready i { color: #34c38f; background: rgba(52,195,143,.12); }
    .customer-form-actions { display: flex; justify-content: flex-end; gap: 9px; margin-top: 4px; }
    @media (max-width: 991.98px) { .customer-side-card { position: static; } }
    @media (max-width: 575.98px) { .customer-form-card .card-body { padding: 18px; } .customer-form-actions { flex-direction: column-reverse; } .customer-form-actions .btn { width: 100%; } }
</style>
