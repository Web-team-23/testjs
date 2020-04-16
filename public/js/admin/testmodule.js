import MultiSelect2 from "../multi-select/multi-select2.js";

const multiSel = (function () {
    const route = '/admin/apiTag';
    const result = async function () {
        try {
            let response = await fetch(route);
            if (response.ok) {
                let data = await response.json();
                console.log(JSON.parse(data));
                return new MultiSelect2(".autocomplete-select", {
                    options: JSON.parse(data),
                    value: [],
                    multiple: true,
                    autocomplete: true,
                    icon: "fa fa-times",
                    onChange: value => {
                        console.log(value);
                    },
                })
            }
        } catch (e) {
            alert(e.message);
        }
    };
    return result();
})();
export default multiSel;

