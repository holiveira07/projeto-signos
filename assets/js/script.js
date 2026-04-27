document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("signo-form");

  if (!form) return;
  form.addEventListener("submit", function (event) {
    const data = document.querySelector("input[name='data_nascimento']").value;

    if (!data) {
      alert("Por favor, preencha a data!");
      event.preventDefault();
      return;
    }

    const hoje = new Date();
    const dataUsuario = new Date(data);

    if (dataUsuario > hoje) {
      alert("A data não pode ser no futuro!");
      event.preventDefault();
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const card = document.querySelector(".card");

  if (card) {
    card.style.opacity = 0;
    card.style.transform = "translateY(20px)";

    setTimeout(() => {
      card.style.transition = "all 0.5s ease";
      card.style.opacity = 1;
      card.style.transform = "translateY(0)";
    }, 100);
  }
});
