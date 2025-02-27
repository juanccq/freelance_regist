const tpl = `
<li id="item-%id%" data-color="%color%" data-name="%name%" data-id="%id%" data-status="team" data-stared="false" data-complete="false" 
  class="%filtered% item-list flex items-center px-6 space-x-4 py-6  transition-all duration-200 
  rtl:space-x-reverse
  dark:hover:bg-transparent
  ">
  <div class="flex-1 checkbox-area">
    <label class="inline-flex items-center cursor-pointer">
      <input type="checkbox" class="enabled hidden" %enabled% onchange="reportActivity()"/>
      <span style="--tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(3px + var(--tw-ring-offset-width)) %color%; background-color:%color%;"
        class="could-hide h-4 w-4 border flex-none border-slate-100 dark:border-slate-800 rounded inline-flex ltr:mr-3 rtl:ml-3 relative transition-all duration-150 bg-slate-100 dark:bg-slate-900">
        <img src="/images/icon/ck-white.svg" alt="" class="h-[10px] w-[10px] block m-auto opacity-0"></span>
      <span class="text-base text-slate-600 dark:text-slate-300 truncate bar-active transition-all duration-150" style1="color:%color%;">%name%</span>
    </label>
  </div>
  <div class="flex">
    <span class="flex-none space-x-2 text-secondary-500 flex rtl:space-x-reverse mr-3">Cantidad de dígitos</span>
    <input %type% %digits-readonly% onchange="reportActivity()" class="digits h-9 text-center font-medium form-control !py-1 !text-xs mr-5" value="%digits%">
    <span class="could-hide flex-none space-x-2 text-secondary-500 flex rtl:space-x-reverse mr-3">Guión</span>
    <input type="checkbox" class="hyppen could-hide table-checkbox mt-1" onchange="reportActivity()" %hyphen% />
  </div>
</li>`;
const tplSample = `<span class="tooltip" style="color:%color%;">%value%
  <span class="tooltiptext">%name%</span>
</span>`;
let body = [];
const base =[
  {
    "key": "pre",
    "name": "PREFIJO",
    "color": "#0F172A"
  },
  {
    "key": "are",
    "name": "AREA",
    "color": "#3F5EDF"
  },
  {
    "key": "dep",
    "name": "DEPARTAMENTO",
    "color": "#FA916B"
  },
  {
    "key": "loc",
    "name": "LOCALIDAD (PROVINCIA)",
    "color": "#3F9A7A"
  },
  {
    "key": "uni",
    "name": "UNIDAD DE TRABAJO",
    "color": "#0CE7FA"
  },
  {
    "key": "tra",
    "name": "AREA DE TRABAJO",
    "color": "#F1595C"
  },
  {
    "key": "ruc",
    "name": "RUBRO CONTABLE",
    "color": "#0F172A"
  },
  {
    "key": "aux",
    "name": "AUXILIAR CONTABLE (TIPO)",
    "color": "darkmagenta"
  },
  {
    "key": "inc",
    "name": "CORRELATIVO",
    "color": "#475569"
  }
];
let saved = JSON.parse($('#newCodigo').val());

saved.forEach((elementSaved) => {
    const element = base.find((i) => elementSaved.key == i.key);
    
    let tplRow = tpl
        .replace(/%id%/g, element.key)
        .replace(/%name%/g, element.name)
        .replace(/%color%/g, element.color)
        .replace(/%filtered%/g, ['pre'].includes(element.key)?'filtered':'cursor-move cod-area-bg hover:shadow-todo hover:bg-slate-200 dark:bg-slate-500')
        .replace(/%enabled%/g, elementSaved.enabled ? "checked" : "")
        .replace(/%digits%/g, element.key == "ruc"?2:elementSaved.digits)
        .replace(/%digits-readonly%/g, element.key == "ruc"?'readonly':'')
        .replace(/%hyphen%/g, elementSaved.hyphen ? "checked" : "");

    if( element.key == 'pre' ) {
        tplRow = tplRow.replaceAll( 'class="filtered item-list flex', 'class="item-list flex' );
    }

    tplRow = tplRow.replace(
        /%type%/i,
        element.key == "pre" ? 'type="text"' : 'type="number" min="0"  max="15"'
    );
    body.push(tplRow);
});
$("#items").html(body.join(""));

// List 1
$("#items").sortable({
    group: "list",
    animation: 200,
    filter: '.filtered',
    ghostClass: "ghost",
    onSort: reportActivity,
});

// Arrays of "data-id"
$("#get-order").click(function () {
    generateSample();
});

// Report when the sort order has changed
function reportActivity() {
    console.log("The sort order has changed");
    generateSample();
}
function generateSample() {
    var newSaved = [];
    var sort1 = $("#items").sortable("toArray");
    console.log(sort1);
    let body = [];
    let total = 0;
    sort1.forEach((element) => {
        let digits = $(`#item-${element} .digits`).val();
        let enabled = $(`#item-${element} .enabled`).is(":checked");
        if (element === "inc") {
          $(`#item-${element} .enabled`).parents('li').find('.could-hide').hide();
          $(`#item-${element} .enabled`).prop("checked", true );
          enabled = true;
        }
        const hyphen = $(`#item-${element} .hyppen`).is(":checked");
        if (enabled) {
          if (element !== "pre") {
              $(`#item-${element} .digits`).val(digits > 0 ? digits : 1);
              digits = $(`#item-${element} .digits`).val();
          }
            let value = element === "pre" ? digits : getRandomInt(digits);
            value += hyphen ? "-" : "";
            total += value.length;
            let sample = tplSample
                .replace(/%value%/g, value)
                .replace(/%color%/g, $(`#item-${element}`).data("color"))
                .replace(/%name%/g, $(`#item-${element}`).data("name"));
            body.push(sample);
        }
        newSaved.push({
            key: element,
            digits: digits,
            enabled: enabled,
            hyphen: hyphen,
        });
    });
    let bodyStr = body.join("");
    // console.log(
    //     `🚀 ~ file: codigos.blade.php:198 ~ generateSample ~ bodyStr:`,
    //     bodyStr
    // );
    $("#sample").html(bodyStr);
    $("#sampleTotal").html(
        `Total caracteres usados: ${total} ${total > 15 ? "SOLO SE PERMITEN 15" : ""}`
    );
    console.log(newSaved);
    $('#newCodigo').val(JSON.stringify(newSaved));
}
reportActivity();
function getRandomInt(digits) {
    digits = parseInt(digits, 0);
    min = 1;
    let maxStr = "";
    for (let index = 0; index < digits; index++) {
        maxStr += "9";
    }
    let max = parseInt(maxStr);

    min = Math.ceil(min);
    max = Math.floor(max);
    let number = Math.floor(Math.random() * (max - min)) + min;
    let result = number.toString().padStart(digits, "0");
    return result;
}
