<?php
// header("Content-Type: application/javascript");
use API\Controller\Config;
?>

<!-- document.addEventListener("DOMContentLoaded", function () {
    const studentId = "<?= $_SESSION['user_id'] ?>";
    getStudentHours(studentId);
}) -->

<!-- function getStudentHours(studentId) {
    axios.get(`<?= Config::BASE_ACTION_URL ?>/getStudentHours`, {
        params: { id: studentId }
    })
    .then(response => {
        if (response.data.status === "error") {
            toastr.error(response.data.message, "Erro");
        } else {
            const hours = response.data;
            console.log("Horas do Aluno:", hours);
        }
    })
    .catch(error => {
        console.error("Erro ao buscar as horas:", error);
        toastr.error("Erro ao buscar as horas", Erro);
    })
} -->
<!-- 
function renderCards(data) {
    const container = document.getElementById("student-hours-cards");
    container.innerHTML = "";

    data.forEach(record => {
        const card = document.createElement("div");
        card.className = "card";

        card.innerHTML =
            <h4>${record.type}</h4>
            <p>${record.description}</p>
            <div class="card-icons">
                <div class="icon ${record.valid ? 'green' : 'red'}">${record.valid ? 'Válido' : 'Inválido'}</div>
                <div class="icon green">${record.hours} horas</div>
                <a href="formative-member-details"><div class="icon gray"><?= __("formative_member.button") ?></div></a>
            </div>
        ;

        container.appendChild(card);
    });
} -->