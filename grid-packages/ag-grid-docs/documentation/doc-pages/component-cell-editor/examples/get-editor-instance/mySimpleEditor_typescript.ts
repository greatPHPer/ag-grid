import { ICellEditorComp, ICellEditorParams } from "@ag-grid-community/core";

const KEY_BACKSPACE = 'Backspace';
const KEY_F2 = 'F2';
const KEY_DELETE = 'Delete';

export class MySimpleEditor implements ICellEditorComp {
    gui!: HTMLInputElement;
    params!: ICellEditorParams;

    init(params: ICellEditorParams) {
        this.gui = document.createElement('input');
        this.gui.type = 'text';
        this.gui.classList.add('my-simple-editor');

        this.params = params;

        let startValue = params.value;

        const isBackspaceOrDelete = params.key === KEY_BACKSPACE || params.key === KEY_DELETE;
        if (isBackspaceOrDelete) {
            startValue = '';
        } else if (params.charPress) {
            startValue = params.charPress;
        }

        if (startValue !== null && startValue !== undefined) {
            this.gui.value = startValue;
        }
    }

    getGui() {
        return this.gui;
    }

    getValue() {
        return this.gui.value;
    }

    afterGuiAttached() {
        this.gui.focus();
    }

    myCustomFunction() {
        return {
            rowIndex: this.params.rowIndex,
            colId: this.params.column.getId()
        };
    }
}
