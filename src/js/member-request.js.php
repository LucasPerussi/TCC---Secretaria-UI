<?php
header("Content-Type: application/javascript");
use API\Controller\Config;
?>

document.addEventListener("DOMContentLoaded", () => {
    const tabButtons = document.querySelectorAll(".tab-button");
    const tabs = document.querySelectorAll(".tab");

    tabButtons.forEach((button) => {
        button.addEventListener("click", () => {
            tabButtons.forEach((btn) => btn.classList.remove("active"));
            tabs.forEach((tab) => tab.classList.remove("active"));

            button.classList.add("active");
            const targetTabId = button.dataset.tab;
            const targetTab = document.getElementById(targetTabId);
            if (targetTab) {
                targetTab.classList.add("active");
            }
        });
    });
});