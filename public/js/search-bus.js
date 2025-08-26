document.querySelectorAll(".edit-btn").forEach((btn) => {
    btn.addEventListener("click", function () {
        const bus = JSON.parse(this.getAttribute("data-bus"));
        document.getElementById("modal-id").value = bus.id;
        document.getElementById("modal-id_station").value = bus.id_station;
        document.getElementById("modal-name_station").value = bus.name_station;
        document.getElementById("modal-created_station").value =
            bus.created_station.replace(/\//g, "-");
        document.getElementById("modal-id_line").value = bus.id_line;
        document.getElementById("modal-name_line").value = bus.name_line;
        document.getElementById("modal-created_line").value =
            bus.created_line.replace(/\//g, "-");
    });
});

// Opcional: prevenir submit real y mostrar datos en consola
document.getElementById("editForm").addEventListener("submit", function (e) {
    e.preventDefault();
    // Aquí puedes hacer un fetch/ajax para actualizar en backend
    alert("Registro actualizado (simulado)");
    var modal = bootstrap.Modal.getInstance(document.getElementById("editModal"));
    modal.hide();
});

