<style>
    :root {
        --bg: #d9d4c7;
        --panel: #e7e2d6;
        --line-dark: #7e7a70;
        --line-light: #ffffff;
        --text: #2b2b2b;
        --input-bg: #f7f6f2;
        --header: #cfc9ba;
        --tab: #ded8ca;
        --danger: #b00020;
        --ok: #0b6b2c;
    }

    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Tahoma, "MS Sans Serif", Arial, sans-serif;
        background: #bfbfbf;
        color: var(--text);
        font-size: 12px;
    }

    /* app window */
    .win {
        width: 980px;
        max-width: 98vw;
        margin: 18px auto;
        background: var(--bg);
        padding: 10px;
        border: 1px solid #6b6b6b;
        box-shadow: 0 10px 25px rgba(0, 0, 0, .25);
    }

    .titlebar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 6px 8px;
        background: linear-gradient(#dfe8ff, #b9c7f2);
        border: 1px solid #6b6b6b;
        margin-bottom: 8px;
        font-weight: 700;
    }

    .titlebar .btn {
        width: 18px;
        height: 18px;
        background: #e9e9e9;
        border: 1px solid #6b6b6b;
        box-shadow: inset 1px 1px 0 #fff;
    }

    /* classic 3D panel */
    .panel {
        background: var(--panel);
        border-top: 1px solid var(--line-light);
        border-left: 1px solid var(--line-light);
        border-right: 1px solid var(--line-dark);
        border-bottom: 1px solid var(--line-dark);
        padding: 8px;
    }

    .panel+.panel {
        margin-top: 8px;
    }

    .grid {
        display: grid;
        grid-template-columns: 1.25fr .95fr;
        gap: 8px;
    }

    .fieldset {
        padding: 8px;
        background: var(--panel);
        border-top: 1px solid var(--line-light);
        border-left: 1px solid var(--line-light);
        border-right: 1px solid var(--line-dark);
        border-bottom: 1px solid var(--line-dark);
        position: relative;
        min-height: 110px;
    }

    .legend {
        position: absolute;
        top: -8px;
        left: 10px;
        padding: 0 6px;
        background: var(--bg);
        font-weight: 700;
        color: #333;
    }

    .row {
        display: grid;
        grid-template-columns: 110px 1fr 26px;
        gap: 6px;
        align-items: center;
        margin-bottom: 6px;
    }

    .row.small {
        grid-template-columns: 70px 1fr 26px;
    }

    .row3 {
        display: grid;
        grid-template-columns: 70px 1fr 70px 1fr;
        gap: 6px;
        align-items: center;
        margin-bottom: 6px;
    }

    label {
        white-space: nowrap;
        color: #222;
    }

    input,
    select {
        height: 22px;
        width: 100%;
        padding: 2px 6px;
        background: var(--input-bg);
        border: 1px solid #6b6b6b;
        box-shadow: inset 1px 1px 0 #fff;
        font-size: 12px;
    }

    .ico {
        height: 22px;
        border: 1px solid #6b6b6b;
        background: #ececec;
        box-shadow: inset 1px 1px 0 #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        user-select: none;
        font-weight: 700;
    }

    .tabs {
        display: flex;
        gap: 6px;
        padding: 6px 8px;
        background: var(--header);
        border: 1px solid #6b6b6b;
        box-shadow: inset 1px 1px 0 #fff;
        margin-top: 8px;
    }

    .tab {
        padding: 4px 10px;
        background: var(--tab);
        border: 1px solid #6b6b6b;
        box-shadow: inset 1px 1px 0 #fff;
        font-weight: 700;
    }

    .tab.active {
        background: #f1ede4;
    }

    .hint {
        margin-left: auto;
        font-weight: 700;
        color: #333;
        opacity: .9;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: #f7f5ef;
        border: 1px solid #6b6b6b;
        box-shadow: inset 1px 1px 0 #fff;
        margin-top: 6px;
    }

    thead th {
        background: #ddd6c8;
        border: 1px solid #8a857b;
        padding: 4px 6px;
        text-align: left;
        font-weight: 700;
    }

    tbody td {
        border: 1px solid #b1ab9c;
        padding: 4px 6px;
        height: 24px;
    }

    .right {
        text-align: right;
    }

    .center {
        text-align: center;
    }

    .bottom {
        display: grid;
        grid-template-columns: 1.2fr 1fr;
        gap: 8px;
        margin-top: 8px;
    }

    .summary {
        display: grid;
        grid-template-columns: 1fr 120px;
        gap: 6px;
        align-items: center;
        margin-bottom: 6px;
    }

    .summary input {
        text-align: right;
    }

    .statusline {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .pill {
        display: inline-flex;
        gap: 6px;
        align-items: center;
        padding: 2px 8px;
        border: 1px solid #6b6b6b;
        background: #f5f2ea;
        box-shadow: inset 1px 1px 0 #fff;
        font-weight: 700;
    }

    .pill.ok {
        color: var(--ok);
    }

    .pill.bad {
        color: var(--danger);
    }

    .toolbar {
        display: flex;
        align-items: center;
        gap: 6px;
        padding: 6px;
        margin-bottom: 8px;
        background: #d6d1c4;
        border-top: 1px solid #fff;
        border-left: 1px solid #fff;
        border-right: 1px solid #7e7a70;
        border-bottom: 1px solid #7e7a70;
        box-shadow: inset 1px 1px 0 #fff;
    }

    .tool-btn {
        padding: 4px 10px;
        background: #ece8dd;
        border: 1px solid #6b6b6b;
        box-shadow: inset 1px 1px 0 #fff;
        cursor: pointer;
        font-weight: 700;
        user-select: none;
    }

    .tool-btn:hover {
        background: #f6f3ea;
    }

    .tool-btn:active {
        box-shadow: inset -1px -1px 0 #fff;
    }

    .tool-btn.danger {
        color: #b00020;
    }

    .tool-sep {
        width: 1px;
        height: 22px;
        background: #7e7a70;
        margin: 0 4px;
    }

    .tool-link{
        text-decoration: none;
        color: inherit;
        display: inline-flex;
        align-items: center;
    }

    .tool-link:hover{
        text-decoration: none;
        color: inherit;
        background: #f6f3ea;
    }

    .tool-link:active{
        box-shadow: inset -1px -1px 0 #fff;
    }

</style>
