import MultiSelect2 from "../multi-select/multi-select2.js";

const multiSel = (function ()
{
  return new MultiSelect2(".autocomplete-select", {
    options: [
      {
        label: "English",
        value: "En"
      },
      {
        label: "Arabic",
        value: "Ar"
      },
      {
        label: "English 1",
        value: "En1"
      },
      {
        label: "Arabic1",
        value: "Ar1"
      },
      {
        label: "English2",
        value: "En2"
      },
      {
        label: "Arabic2",
        value: "Ar2"
      },
      {
        label: "Arabic3",
        value: "Ar3"
      },
      {
        label: "English3",
        value: "En3"
      },
      {
        label: "Arabic3",
        value: "Ar3"
      },
    ],
    value: [],
    multiple: true,
    autocomplete: true,
    icon: "fa fa-times",
    onChange: value => {
      console.log(value);
    },
  })
})();
export default  multiSel;

