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

let telefoneRowCreate = document.querySelector(".telefone-row-create");
let btnAddTelefoneCreate = document.querySelector("#btnAddTelefoneCreate");
let btnRemoveTelefoneCreate = document.querySelector(
  "#btnRemoveTelefoneCreate"
);
let lengthTelefonesCreate = document.querySelector("#lengthTelefonesCreate");

btnAddTelefoneCreate.addEventListener("click", () => {
  lengthTelefonesCreate.setAttribute(
    "value",
    parseInt(lengthTelefonesCreate.value) + 1
  );
  renderTelefone(telefoneRowCreate, lengthTelefonesCreate.value);
});

btnRemoveTelefoneCreate.addEventListener("click", () => {
  if (parseInt(lengthTelefonesCreate.value) > 1)
    lengthTelefonesCreate.setAttribute(
      "value",
      parseInt(lengthTelefonesCreate.value) - 1
    );
  renderTelefone(telefoneRowCreate, lengthTelefonesCreate.value);
});

let renderTelefone = (item, length) => {
  item.innerHTML = "";
  for (let i = 0; i < length; i++) {
    item.innerHTML += `<div class="input-field col s12">
    <input id="telefone-create-${
      i + 1
    }" required type="text" name="telefones[]" class="phone"/>
    <label for="telefone-create-${i + 1}" >Telefone #${i + 1}</label>
    </div>
    <br/>`;
  }
  $(".phone").mask("(00) 0000-0000");
};

renderTelefone(telefoneRowCreate, lengthTelefonesCreate.value);

$(".cpf").mask("000.000.000-00", { reverse: true });
