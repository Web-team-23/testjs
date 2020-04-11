customElements.define('multi-input', class MultiInputComponent extends HTMLElement {
    constructor() {
        super();
        this.innerHTML +=
        `<style>
        multi-input{
              border: 1px solid grey;
        }
        multi-input div.item::after {
          color: #790001;
          content: '×';
          cursor: pointer;
          font-size: 18px;
          pointer-events: auto;
          padding: 0.2em;
          margin-left: 0.1em;
        }
        </style>`;
        this._shadowRoot = this.attachShadow({mode: 'open'});
        this._shadowRoot.innerHTML =
        `<style>
        :host {
          display: block;
          overflow: hidden;
          padding: 5px;
        }
        ::slotted(div.item) {
          background-color:  #dedede;
          border-radius: 2px;
          color: #222;
          display: inline-block;
          font-size:13px;
          margin: 5px;
          padding: 2px 25px 2px 5px;
          pointer-events: none;
          position: relative;
          top: -1px;
        }
        ::slotted(div.item:hover) {
          background-color: rgba(174,191,238,0.65);
        }
        ::slotted(input) {
          border: none;
          font-size: 12px;
          outline: none;
        }
        </style>
        <slot></slot>`;

        this._datalist = this.querySelector('datalist');
        this._allowedValues = [];
        for (const option of this._datalist.options) {
            this._allowedValues.push(option.value);
        }
        this._input = this.querySelector('input');
        this._input.onblur = this._handleBlur.bind(this);
        this._input.oninput = this._handleInput.bind(this);
        this._input.onkeydown = (event) => {
            this._handleKeydown(event);
        };
        this._allowDuplicates = this.hasAttribute('allow-duplicates');
    }

    // Called by _handleKeydown() when the value of the input is an allowed value.
    _addItem(value) {
        this._input.value = '';
        const item = document.createElement('div');
        item.classList.add('item');
        item.textContent = value;
        this.insertBefore(item, this._input);
        item.onclick = () => {
            this._deleteItem(item);
        };

        // Remove value from datalist options and from _allowedValues array.
        // Value is added back if an item is deleted (see _deleteItem()).
        if (!this._allowDuplicates) {
            for (const option of this._datalist.options) {
                if (option.value === value) {
                    option.remove();
                }
            }
            this._allowedValues =
                this._allowedValues.filter((item) => item !== value);
        }
    }

    // Called when the × icon is tapped/clicked or
    // by _handleKeydown() when Backspace is entered.
    _deleteItem(item) {
        const value = item.textContent;
        item.remove();
        if (!this._allowDuplicates) {
            const option = document.createElement('option');
            option.value = value;
            this._datalist.insertBefore(option, this._datalist.firstChild);
            this._allowedValues.push(value);
        }
    }

    // Avoid stray text remaining in the input element that's not in a div.item.
    _handleBlur() {
        this._input.value = '';
    }

    // Called when input text changes
    _handleInput() {
        // Add a div.item, but only if the current value
        // of the input is an allowed value
        const value = this._input.value;
        if (this._allowedValues.includes(value)) {
            this._addItem(value);
        }
    }

    // Called when text is entered or keys pressed in the input element.
    _handleKeydown(event) {
        const itemToDelete = event.target.previousElementSibling;
        const value = this._input.value;
        // On Backspace, delete the div.item to the left of the input
        if (value === '' && event.key === 'Backspace' && itemToDelete) {
            this._deleteItem(itemToDelete);
            // Add a div.item, but only if the current value
            // of the input is an allowed value
        } else if (this._allowedValues.includes(value)) {
            this._addItem(value);
        }
    }

    // Public method for getting item values as an array.
    getValues() {
        const values = [];
        const items = this.querySelectorAll('.item');
        for (const item of items) {
            values.push(item.textContent);
        }
        return values;
    }
});

// multi-select component initialisation
const getButton = document.getElementById('get');
const multiInput = document.querySelector('multi-input');
const values = document.querySelector('#values');

getButton.onclick = () => {
  if (multiInput.getValues().length > 0) {
    values.textContent = `Got ${multiInput.getValues().join(' and ')}!`;
  } else {
    values.textContent = 'Got noone  :`^(.';
  }
};
document.querySelector('input').focus();

