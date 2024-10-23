window.addEventListener("resize", function () {
  addRequiredClass();
});

function addRequiredClass() {
  if (window.innerWidth < 1200) {
    document.body.classList.add("mobile");
  } else {
    document.body.classList.remove("mobile");
  }
}

window.onload = addRequiredClass;

let hamburger = document.querySelector(".hamburger");
let mobileNav = document.querySelector(".nav-list");

let bars = document.querySelectorAll(".hamburger span");

let isActive = false;

hamburger.addEventListener("click", function () {
  mobileNav.classList.toggle("open");
  if (!isActive) {
    bars[0].style.transform = "rotate(45deg)";
    bars[1].style.opacity = "0";
    bars[2].style.transform = "rotate(-45deg)";
    isActive = true;
  } else {
    bars[0].style.transform = "rotate(0deg)";
    bars[1].style.opacity = "1";
    bars[2].style.transform = "rotate(0deg)";
    isActive = false;
  }
});

// function expandSpace() {
//     document.getElementById("space").style.opacity = 1;
// }

function loadResource(id, btnId) {
  const elements = [
    "ativos",
    "history",
    "tickets",
    "room",
    "materials",
    "bucard",
    "ar",
    "settings",
  ];
  const btns = [
    "btnAtivos",
    "btnHistory",
    "btnTickets",
    "btnRoom",
    "btnMaterials",
    "btnBucard",
    "btnAr",
    "btnSettings",
  ];

  elements.forEach((elementId) => {
    const element = document.getElementById(elementId);
    if (element) {
      element.hidden = true;
    }
  });

  btns.forEach((btn) => {
    const btnElement = document.getElementById(btn);
    if (btnElement) {
      btnElement.classList.remove("reading");
    }
  });

  const chosenElement = document.getElementById(id);
  if (chosenElement) {
    chosenElement.hidden = false;
  }

  const chosenBtn = document.getElementById(btnId);
  if (chosenBtn) {
    chosenBtn.classList.add("reading");
  }
}
function loadResourceMobile(id, btnId) {
    const elements = ['ativosMobile', 'historyMobile', 'ticketsMobile', 'roomMobile', 'materialsMobile', 'bucardMobile', 'arMobile', 'settingsMobile'];
    const btns = ['btnAtivosMobile', 'btnHistoryMobile', 'btnTicketsMobile', 'btnRoomMobile', 'btnMaterialsMobile', 'btnBucardMobile', 'btnArMobile', 'btnSettingsMobile'];
    
    elements.forEach(elementId => {
        const element = document.getElementById(elementId);
        if (element && elementId !== id) {
            element.hidden = true;
        }
    });

    btns.forEach(btn => {
        const btnElement = document.getElementById(btn);
        if (btnElement && btn !== btnId) {
            btnElement.classList.remove('reading');
            const chevron = btnElement.querySelector('.chevron');
            if (chevron) {
                chevron.classList.remove('bi-chevron-up');
                chevron.classList.add('bi-chevron-down');
            }
        }
    });

    const chosenElement = document.getElementById(id);
    const chosenBtn = document.getElementById(btnId);
    if (chosenElement && chosenBtn) {
        if (chosenElement.hidden) {
            chosenElement.hidden = false;
            chosenBtn.classList.add('reading');
            const chevron = chosenBtn.querySelector('.chevron');
            if (chevron) {
                chevron.classList.remove('bi-chevron-down');
                chevron.classList.add('bi-chevron-up');
            }
        } else {
            chosenElement.hidden = true;
            chosenBtn.classList.remove('reading');
            const chevron = chosenBtn.querySelector('.chevron');
            if (chevron) {
                chevron.classList.remove('bi-chevron-up');
                chevron.classList.add('bi-chevron-down');
            }
        }
    }
}
