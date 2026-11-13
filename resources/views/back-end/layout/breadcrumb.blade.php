<style>
.custom-alert-error {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 14px 18px;
    margin-bottom: 15px;

    background: #fff1f0;
    border: 1px solid #ffccc7;
    border-left: 4px solid #ff4d4f;
    border-radius: 6px;

    color: #cf1322;
    font-family: inherit;
}

.custom-alert-icon {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 22px;
    height: 22px;
    min-width: 22px;

    border-radius: 50%;
    background: #ff4d4f;
    color: white;

    font-size: 14px;
    font-weight: bold;
}

.custom-alert-content {
    flex: 1;
    text-align: left;
}

.custom-alert-content strong {
    display: block;
    font-size: 15px;
    font-weight: 600;
    margin-bottom: 3px;
}

.custom-alert-content p {
    margin: 0;
    font-size: 13px;
    line-height: 1.6;
    font-weight: 400;
}

.custom-alert-close {
    border: none;
    background: transparent;
    color: #cf1322;
    font-size: 22px;
    cursor: pointer;
    line-height: 1;
}
</style>

@if (Session::has('error'))
    <div class="custom-alert-error">
        <span class="custom-alert-icon">!</span>

        <div class="custom-alert-content">
            <strong>Warning</strong>
            <p>{{ Session::get('error') }}</p>
        </div>

        <button type="button" class="custom-alert-close"
            onclick="this.parentElement.remove()">
            &times;
        </button>
    </div>
@endif