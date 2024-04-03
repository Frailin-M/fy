(function () {
  "use strict";

  let forms = document.querySelectorAll('.php-email-form');

  forms.forEach(function(form) {
    form.addEventListener('submit', function(event) {
      event.preventDefault();

      let thisForm = this;

      // Mostrar el círculo de carga
      let loadingCircle = thisForm.querySelector('.loading');
      loadingCircle.style.display = 'block';

      // Deshabilitar botones durante el envío del formulario
      let submitButton = thisForm.querySelector('button[type="submit"]');
      let resetButton = thisForm.querySelector('button[type="reset"]');
      submitButton.disabled = true;
      resetButton.disabled = true;

      // Simular el envío del formulario
      setTimeout(function() {
        // Descomenta esta línea para simular un error
        // displayError(thisForm, 'Hubo un error al enviar el formulario');

        // Simular éxito
        loadingCircle.style.display = 'none';
        thisForm.querySelector('.sent-message').classList.add('d-block');
        fadeIn(thisForm.querySelector('.sent-message'));

        // Limpiar formulario
        thisForm.reset();

        // Restaurar botones a su posición original
        submitButton.disabled = false;
        resetButton.disabled = false;

        // Después de 3 segundos, ocultar el mensaje de éxito
        setTimeout(function() {
          fadeOut(thisForm.querySelector('.sent-message'));
        }, 3000);
      }, 1500);
    });
  });

  function displayError(thisForm, error) {
    thisForm.querySelector('.loading').style.display = 'none';
    thisForm.querySelector('.error-message').innerHTML = error;
    thisForm.querySelector('.error-message').classList.add('d-block');
  }

  // Función para desvanecer gradualmente un elemento
  function fadeOut(element) {
    element.style.transition = 'opacity 1s ease-in-out';
    element.style.opacity = 0;
    setTimeout(function() {
      element.style.display = 'none';
    }, 1000);
  }

  // Función para hacer aparecer gradualmente un elemento
  function fadeIn(element) {
    element.style.display = 'block';
    setTimeout(function() {
      element.style.transition = 'opacity 1s ease-in-out';
      element.style.opacity = 1;
    }, 100);
  }

})();











