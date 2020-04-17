import MultiSelect from "../multi-select2/multi-select.js";

const multiSelect = (function () {
    const route = '/admin/apiTag';
    const createComponent = async function () {
        try {
            let response = await fetch(route);
            if (response.ok) {
                let data = await response.json();
                let component = new MultiSelect('.multi-select', {
                    items: JSON.parse(data)
                });
                component.on('change', function (e) {
                    console.log(e.detail, component.getCurrent('id'));
                });
                return component;
            }
        } catch (e) {
            alert(e.message);
        }
    };
    return createComponent();
})();
export default multiSelect;
