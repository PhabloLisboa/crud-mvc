document.addEventListener("DOMContentLoaded", function () {
  var elems = document.querySelectorAll(".sidenav");
  var instances = M.Sidenav.init(elems, {});
});

document.addEventListener("DOMContentLoaded", function () {
  var elems = document.querySelectorAll(".modal");
  var instances = M.Modal.init(elems, {});
});

document.addEventListener("DOMContentLoaded", function () {
  var elems = document.querySelectorAll("select");
  var instances = M.FormSelect.init(elems, {});
});

let telefones = [];
let telefoneRow = document.querySelector(".telefone-row");
let btnAddTelefone = document.querySelector("#btnAddTelefone");
let btnRemoveTelefone = document.querySelector(".btnRemoveTelefone");
let lengthTelefones = document.querySelector("#lengthTelefones");

btnRemoveTelefone.style.display = "none";

btnAddTelefone.addEventListener(
  "click",
  () => (lengthTelefones.value = `${lengthTelefones.value + 1}`)
);

btnRemoveTelefone.addEventListener("click", () =>
  console.log((lengthTelefones.value = lengthTelefones.value - 1))
);

lengthTelefones.addEventListener("change", (e) => {
  console.log("alo");
  for (let i = 0; i <= e.value; i++) {
    telefoneRow.innerHTML += `<div class="input-field col s12">
      <input id="telefone-create-${
        i + 1
      }" required type="text" name="telefones[]"/>
      <label for="telefone-create-${i + 1}" >Telefone #${i + 1}</label>
    </div>
    <br>`;
  }
});
