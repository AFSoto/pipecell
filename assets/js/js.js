/**
 * Aplica formato de moneda (separadores de miles) al valor de entrada.

 */
function formatCurrency(inputElement, locale) {
    let rawValue = inputElement.value;
    
    // 1. Limpiar el valor: Eliminar todo lo que no sea dígito o coma decimal.
    let cleanValue = rawValue.replace(/[^0-9,]/g, '');
    
    // 2. Reemplazar la coma decimal por el punto estándar para JS (para que parseFloat funcione).
    // Nota: Solo permite una coma decimal
    let parts = cleanValue.split(',');
    if (parts.length > 2) {
        // Si hay más de una coma, ignoramos las demás
        cleanValue = parts[0] + '.' + parts.slice(1).join('');
    } else if (parts.length === 2) {
        cleanValue = parts[0] + '.' + parts[1];
    } else {
        cleanValue = parts[0];
    }
    
    // 3. Convertir a número (float)
    let number = parseFloat(cleanValue);

    if (isNaN(number)) {
        // Manejar el caso de entrada vacía o inválida al inicio
        document.getElementById('costo_total_hidden').value = '';
        if (rawValue === '') {
             inputElement.value = '';
        }
        return;
    }
    
    // 4. Formato de número usando Intl.NumberFormat
    
    // Esto aplicará el punto de miles (Ej: 23.000) y la coma decimal.
    const formatter = new Intl.NumberFormat(locale, {
        style: 'decimal',
        minimumFractionDigits: 0, 
        maximumFractionDigits: 2,
    });

    let formattedValue = formatter.format(number);
    
    // 5. Corrección de entrada: Mantener la coma decimal flotando si el usuario la acaba de escribir
    // Esto hace que la UX sea más fluida.
    let endsWithDecimal = rawValue.slice(-1) === ',';

    if (endsWithDecimal) {
        // Aseguramos que la coma se muestre mientras el usuario escribe los céntimos
        if (!formattedValue.includes(',')) {
            formattedValue += ',';
        }
    }
    
    // 6. Actualizar los campos
    
    inputElement.value = formattedValue; 
    document.getElementById('costo_total_hidden').value = number;
}



//script para que escuche el cambio en el select para filtrar por estados en las reparaciones


document.addEventListener('DOMContentLoaded', function() {
    const selectFiltro = document.getElementById('filtro-estado');
    const contenedores = document.querySelectorAll('.tabla-contenido');

    // Función que maneja el cambio de filtro
    function manejarCambioFiltro() {
        // Obtiene el ID del contenedor que debe mostrarse
        const targetId = selectFiltro.value;

        // Itera sobre todos los contenedores de la tabla
        contenedores.forEach(contenedor => {
            // Oculta todos los contenedores por defecto
            contenedor.style.display = 'none';
        });

        // Muestra SOLO el contenedor cuyo ID coincide con el valor seleccionado
        const targetDiv = document.getElementById(targetId);
        if (targetDiv) {
            targetDiv.style.display = 'block';
        }
    }

    // 1. Asigna el evento 'change' (cuando el usuario selecciona una opción)
    selectFiltro.addEventListener('change', manejarCambioFiltro);
    
    // 2. Ejecuta la función una vez al cargar la página para asegurar que el filtro 'todos' sea visible
    // manejarCambioFiltro(); // Esto es opcional si ya usaste style="display: none;" en los demás.
});


//actualizar el estado de la reparacion desde la lista donde se filtran por estados 

document.addEventListener('change', function(e) {
    if (e.target.classList.contains('select-estado')) {
        const select = e.target;
        const idReparacion = select.getAttribute('data-id');
        const idCaja = select.getAttribute('data-caja');
        const nuevoEstado = select.value;

        // Feedback visual: Cambiar color temporalmente
        select.classList.add('border-success');

        // Enviar datos al controlador
        fetch(`${BASE_URL}reparacion/actualizarEstadoAjax`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `id=${idReparacion}&caja_id=${idCaja}&estado=${nuevoEstado}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
        alert('Estado actualizado correctamente');
    location.reload(); // Esto soluciona tu problema de raíz
    } else {
                alert('Error al actualizar: ' + data.message);
                location.reload(); // Revertir cambio visual
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error de conexión');
        });
    }
});