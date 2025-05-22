const template = document.createElement('template');
const template_item = document.createElement('template');
template.innerHTML = `
<style>
    :host {
        --gray-100: rgb(243 244 246);
        --gray-200: rgb(229 231 235);
        --gray-300: rgb(209 213 219);
        --gray-400: rgb(156 163 175);
        --gray-600: rgb(75 85 99);
        --gray-800: rgb(31 41 55);
        --blue-100: rgb(219 234 254);
        --blue-600: rgb(37 99 235);
        font-family: Figtree, ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }
    .main {
        display: flex;
        flex: 1 1 auto;
        flex-direction: column;
        align-items: center;
        height: 16rem;
    }
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
    }
    .form-group {
        margin-top: .5rem;
        margin-bottom: .5rem;
        background-color: white;
        padding: .25rem;
        display: flex;
        border: 1px solid var(--gray-200);
        border-radius: .25rem;
    }
    .wrap {
        display: flex;
        flex: 1 1 auto;
        flex-wrap: wrap;
    }
    input {
        appearance: none;
        outline: none;
        width: 100%;
        color: var(--gray-800);
        border: 0;
        border-radius: .1rem;
        padding: 0.5rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5rem;
    }
    .clean-button {
        cursor: pointer;
        width: 1.5rem;
        font-size: 1.5rem;
        margin-right: .25rem;
        height: 100%;
        display: flex;
        align-items: center;
        outline: none;
        color: var(--gray-400);
    }
    .clean-button:hover {
        outline: none;
    }
    div.select-button {
        cursor: pointer;
        color: var(--gray-300);
        width: 2rem;
        padding: .25rem .25rem .25rem .5rem;
        border-left: 1px solid var(--gray-200);
        display: flex;
        align-items: center;
    }
    div.select-button button {
        cursor: pointer;
        width: 1.5rem;
        height: 1.5rem;
        font-size: 2rem;
        transform: translate(50%, 0) rotate(90deg);
        rotate: ;
        color: var(--gray-600);
    }
    .outline-none {
        outline: 2px solid transparent;
        outline-offset: 2px
    }
    .outline-none:hover {
        outline: 2px solid transparent;
        outline-offset: 2px
    }
    .shadow {
        box-shadow: 0 0 transparent, 0 0 transparent, 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
    }
    button {
        appearance: none;
        background-color: transparent;
        border: none;
    }
    .selector-container {
        position: absolute;
        top: 100%;
        z-index: 40;
        width: 100%;
        left: 0;
        border: 1px solid var(--gray-100);
        border-radius: .25rem;
        max-height: 20rem;
        overflow-x: hidden;
        overflow-y: auto;
    }
    .selector-column {
        display: flex;
        flex-direction: column;
        width: 100%;
    }
    .selector-item {
        cursor: pointer;
        width: 100%;
        border-bottom: 1px solid var(--gray-100);
        border-top-left-radius: 0.25rem;
        border-top-right-radius: 0.25rem;
    }
    .selector-item:hover {
        background-color: var(--blue-100);
    }

    .selector-item-container {
        display: flex;
        align-items: center;
        position: relative;
        width: 100%;
        padding: .5rem 1rem;
        border-left: 2px solid transparent;
        background-color: white;
    }
    .selector-item-container:hover {
        color: var(--blue-100);
        background-color: var(--blue-600);
        border-color: var(--blue-600);
    }
    .selector-item-container:active {
        border-color: var(--blue-600);
    }
    .selector-item-container.active {
        border-color: var(--blue-600);
    }
</style>

<div class="main">
    <div class="container">
        <div style="width: 100%;">
            <div class="form-group">
                <div class="wrap"></div>
                <input value="" id="input" autocomplete="off">
                <div>
                    <button class="clean-button outline-none">&times;</button>
                </div>
                <div class="select-button">
                    <button class="outline-none">
                        &#x1F892;
                    </button>
                </div>
            </div>
        </div>
        <div class="selector-container shadow">
            <div class="selector-column"></div>
        </div>
    </div>
</div>
`

template_item.innerHTML = `
<div class="selector-item">
    <div class="selector-item-container">
        Python
    </div>
</div>
`

class SelectInput extends HTMLElement {
    #values = [];

    constructor() {
        super();
        let shadow = $(this.attachShadow({mode: 'open'}));
        shadow.append(template.content.cloneNode(true));
        $(window).click((e) => {
            this.setAttribute('open', '');
        })
        shadow.find('.selector-container').on('click', (e) => e.stopPropagation())
        shadow.find('.clean-button').on('click', () => this.#cleanInput());
        shadow.find('.select-button').on('click', (e) => {
            e.stopPropagation();
            this.setAttribute('open', 'true');
        })
        shadow.find('input').on('change', (e) => this.#inputChange(e))
        shadow.find('input').on('input', (e) => this.#inputInput(e))
    }

    static get observedAttributes() {
        return ['open', 'data-values', 'selected'];
    }

    get open() {
        return !!this.getAttribute('open');
    }

    set open(value) {
        this.setAttribute('open', value ? 'true' : '');
    }

    get selected() {
        return this.getAttribute('selected');
    }

    set selected(value) {
        this.setAttribute('selected', value);
    }

    get dataValues() {
        return JSON.stringify(this.#values);
    }

    set dataValues(value) {
        this.setAttribute('data-values', value);
    }

    connectedCallback() {
        if (!this.hasAttribute('open')) {
            this.open = false;
        }
        this.#updateValues();
    }

    attributeChangedCallback(name, oldVal, newVal) {
        switch (name) {
            case 'open':
                $(this.shadowRoot).find('.selector-container').css('display', !!newVal ? 'flex' : 'none');
                break;
            case 'data-values':
                this.#values = JSON.parse(newVal);
                this.#updateValues();
                break;
            case 'selected':
                this.#updateSelected();
                break;
        }
    }

    #cleanInput() {
        $(this.shadowRoot).find('input').val('');
    }

    #inputChange(e) {
        let input = $(e.target);
        let selected = input.val();
        for (let key in this.#values) {
            let value = this.#values[key];
            console.log(key);
            if (value.startsWith(selected)) {
                console.log(value)
                input.val(value);
                this.setAttribute('selected', key);
                return
            }
        }
        input.val('')
    }

    #inputInput(e) {
        this.setAttribute('open', 'true');
        const input = $(e.target);
        const value = input.val();

        for (const _item of $(this.shadowRoot).find('.selector-item-container').toArray()) {
            const item = $(_item);
            item.parent().css('display', item.text().startsWith(value) ? 'inherit' : 'none')
        }
    }

    #updateValues() {
        let container = $(this.shadowRoot).find('.selector-column');
        container.empty();
        for (let key in this.#values) {
            let new_item = $(template_item.content.cloneNode(true));
            const selected = this.getAttribute('selected');
            const item = new_item.find('.selector-item');
            const item_container = new_item.find('.selector-item-container');
            item_container.text(this.#values[key])
            if (key === selected || this.#values[key] === selected) {
                item_container.addClass('active');
            }
            item.attr('data-id', key);
            item.on('click', (e) => {
                this.setAttribute('selected', $(e.target).attr('data-id'));
            })
            container.append(new_item);
        }
    }

    #updateSelected() {
        const selected = this.getAttribute('selected');
        const shadow = $(this.shadowRoot);
        const items = shadow.find('.selector-item-container').toArray();
        const input = shadow.find('input');
        $.each(items, (key, value) => {
            let element = $(value);
            if (selected === element.parent().attr('data-id') || selected === element.text()) {
                input.val(element.text());
                element.addClass('active');
            } else if (element.hasClass('active')) {
                element.removeClass('active');
            }
        })
    }
}

customElements.define('select-input', SelectInput);
