// const bodyDark = "#202124";
// const bodyLight = "#f8f8f8";
// const formInputsDark = "#1f1f1f";
// const formInputsLight = "#fff";
// const inputsDisabledDark = "#454444";
// const inputsDisabledLight = "#bdbdbd";
// const cardContentDark = "#303134";
// const cardContentLight = "#f8f8f8";
// const cardDark = "#27282B";
// const cardLight = "#fff";
// const smallCardLight = "#ffffff";
// const smallCardDark = "#27282B";
// const menuDark = "#282A2C";
// const menuLight = "#fff";
// const textoAzul = "#249ccc";
// const textoVerde = "#6dff34";
// const textoLaranja = "#ff6d23";
// const textoBranco = "#fff";
// const textoCinza = "#27282B";
// const textoCinzaEscuro = "#27282B";
// const overlayDark = "#a9a9a9";
// const overlayLight = "#f8f8f8";
// const shadowLight =
//   "linear-gradient(#fff 41%, rgba(255, 255, 255, 0.11) 95%, rgba(255, 255, 255, 0));";
// const shadowDark =
//   "linear-gradient(#27282B 41%, rgb(28 28 28 / 11%) 95%, rgb(37 36 36 / 0%))";
  

// var cards = document.getElementsByClassName("card");
// var colFormLabel = document.getElementsByClassName("col-form-label");
// var navbarFloating = document.getElementsByClassName("navbar-floating");
// var headerNavbarShadow = document.getElementsByClassName(
//   "header-navbar-shadow"
// );
// var navigation = document.getElementsByClassName("navigation");
// var mainMenu = document.getElementsByClassName("main-menu");
// var tags = document.getElementsByClassName("tags");
// var swiperSlide = document.getElementsByClassName("swiper-slide");
// var accordion = document.getElementsByClassName("accordion-button");
// var accordionBody = document.getElementsByClassName("accordion-body");
// var open = document.getElementsByClassName("menu-item-animating");
// var shadow = document.getElementsByClassName("shadow-bottom");
// var formControl = document.getElementsByClassName("form-control");
// var inputGroup = document.getElementsByClassName("input-group");
// var inputGroupMerge = document.getElementsByClassName("input-group-merge");
// var inputGoupText = document.getElementsByClassName("input-group-text");
// var formSelect = document.getElementsByClassName("form-select");
// var qlToolbar = document.getElementsByClassName("ql-snow");
// var profileHeaderNav = document.getElementsByClassName("navbar-light");
// var pagination = document.getElementsByClassName("page-link");
// var sidebar = document.getElementsByClassName("sidebar-content");
// var listGroupItem = document.getElementsByClassName("list-group-item");
// var todoItem = document.getElementsByClassName("todo-item");
// var appFixedSearch = document.getElementsByClassName("app-fixed-search");
// var kanbanItem = document.getElementsByClassName("kanban-item");
// var modalDialog = document.getElementsByClassName("modal-content");
// var modalTitle = document.getElementsByClassName("modal-header");
// var offcanvas = document.getElementsByClassName("offcanvas");
// var blogCategoryTitle = document.getElementsByClassName("blog-category-title");
// var textBody = document.getElementsByClassName("text-body");
// var navContainer = document.getElementsByClassName("navbar-container");
// var searchInput = document.getElementsByClassName("search-input");
// var dropdown = document.getElementsByClassName("dropdown-menu ");
// var dropdownItem = document.getElementsByClassName("dropdown-item ");
// var serInfo = document.getElementsByClassName("user-info");
// var content = document.getElementsByClassName("content");
// var appContent = document.getElementsByClassName("app-content");
// var userName = document.getElementsByClassName("user-name");
// var userStatus = document.getElementsByClassName("user-status");
// var badges = document.getElementsByClassName("badge");
// var sectionLabel = document.getElementsByClassName("section-label");
// var navigationheader = document.getElementsByClassName("navigation-header");
// var subsub = document.getElementsByClassName("subsub");
// // var cta = document.getElementById("cta");
// var elements = document.getElementsByClassName("branco");
// var headerNavbar = document.getElementsByClassName("header-navbar");
// var navLink = document.getElementsByClassName("nav-link");




// document.addEventListener("DOMContentLoaded", function () {
//   const themeSwitch = document.getElementById("theme");
//   var iconElement = document.getElementById("icon");

  // Verifica se existe uma preferência no LocalStorage
//   const currentTheme = localStorage.getItem("theme");

//   if (currentTheme === "Dark") {
//     // themeSwitch.checked = true;
//     changeDark();
//   }
//   if (currentTheme === "Light") {
//     // themeSwitch.checked = true;
//     changeLight();
//   }

//   // Listener para o evento de mudança do switch
//   themeSwitch.addEventListener("click", function () {
//     if (currentTheme === "Light") {
//         console.log("caiu no click if light");
//       changeDark();
//       iconElement.setAttribute("data-feather", "sun");
//       localStorage.setItem("theme", "Dark");
//     }
//     if (currentTheme === "Dark") {
//         console.log("caiu no click if dark");
//       changeLight();
//       iconElement.setAttribute("data-feather", "mooon");
//       localStorage.setItem("theme", "Light");
//     }
//   });

// });

// function changeTheme() {
//   const theme = localStorage.getItem("theme");
// //   const theme = getCookie("theme");
//   if (theme === "Dark") {
//     changeDark();
//     document.getElementById("turnDark").style.display = "none";
//     document.getElementById("turnLight").style.display = "block";
//   } else {
//     changeLight();
//     document.getElementById("turnDark").style.display = "block";
//     document.getElementById("turnLight").style.display = "none";
//   }
// }

// function setCookie(name, value, daysToExpire) {
//   const date = new Date();
//   date.setTime(date.getTime() + daysToExpire * 24 * 60 * 60 * 1000); // Calcula a data de expiração
//   const expires = "expires=" + date.toUTCString();
//   document.cookie = name + "=" + value + "; " + expires + "; path=/";
// }

// function getCookie(name) {
//   const cookieString = document.cookie;
//   const cookies = cookieString.split("; ");
//   for (const cookie of cookies) {
//     const [cookieName, cookieValue] = cookie.split("=");
//     if (cookieName === name) {
//       return cookieValue;
//     }
//   }
//   return null; // Se o cookie não for encontrado, retorna null.
// }

// window.addEventListener("load", function() {
//     // Sua função será chamada após o carregamento completo da página
//     changeTheme();
// });

function changeDark() {
  // for (var i = 0; i < appContent.length; i++) {
  //   appContent[i].style.backgroundColor = bodyDark;
  // }

  // for (var i = 0; i < shadow.length; i++) {
  //   shadow[i].style.background = shadowDark;
  // }
  // const h1Elements = document.querySelectorAll("h1");
  // h1Elements.forEach((h1) => {
  //   h1.style.color = textoAzul;
  // });
  // const h2Elements = document.querySelectorAll("h2");
  // h2Elements.forEach((h2) => {
  //   // h2.style.color = textoBranco;
  //   h2.style.color = textoAzul;
  //   // h2.style.color = textoVerde;
  //   // h2.style.color = textoLaranja;
  //   // h2.style.color = "#e2b91b";
  // });
  // const h3Elements = document.querySelectorAll("h3");
  // h3Elements.forEach((h3) => {
  //   h3.style.color = textoVerde;
  // });
  // const h4Elements = document.querySelectorAll("h4");
  // h4Elements.forEach((h4) => {
  //   h4.style.color = textoBranco;
  // });
  // const h5Elements = document.querySelectorAll("h5");
  // h5Elements.forEach((h5) => {
  //   h5.style.color = textoBranco;
  // });
  // const h6Elements = document.querySelectorAll("h6");
  // h6Elements.forEach((h6) => {
  //   h6.style.color = textoBranco;
  // });
  // const buttons = document.querySelectorAll("button");
  // buttons.forEach((button) => {
  //   button.style.color = textoBranco;
  // });
  // const li = document.querySelectorAll("li");
  // li.forEach((li) => {
  //   li.style.color = "#fff";
  // });
  // const disabled = document.querySelectorAll("disabled");
  // disabled.forEach((disabled) => {
  //   disabled.style.backgroundColor = inputsDisabledDark;
  // });

  // const inputs = document.getElementsByTagName('input');
  // for (let i = 0; i < inputs.length; i++) {
  //     if (inputs[i].disabled) {
  //         inputs[i].style.backgroundColor = inputsDisabledDark; // Defina a cor desejada aqui
  //     }
  // }




  // const body = document.querySelector("body");
 
  //   body.style.backgroundColor = "#202124 !important";
 
  // const a = document.querySelectorAll("a");
  // a.forEach((a) => {
  //   // a.style.color = textoAzul;
  //   // a.style.color = textoLaranja;
  //   a.style.color = textoBranco;
  //   // a.style.color = textoVerde;
  // });

  // const p = document.querySelectorAll("p");
  // p.forEach((p) => {
  //   p.style.color = textoBranco;
  // });
  // const title = document.querySelectorAll("title");
  // title.forEach((title) => {
  //   title.style.color = textoBranco;
  // });
  // // const tspan = document.querySelectorAll("tspan");
  // // tspan.forEach((tspan) => {
  // //   tspan.style.color = textoBranco;
  // // });

  // // const span = document.querySelectorAll("span");
  // // span.forEach((span) => {
  // //     span.style.color = textoBranco;
  // // });

  
  // const strong = document.querySelectorAll("strong");
  // strong.forEach((strong) => {
  //   strong.style.color = textoBranco;
  // });

  // //    formularios
  // for (var i = 0; i < formControl.length; i++) {
  //   formControl[i].style.backgroundColor = formInputsDark;
  //   formControl[i].style.color = "#fff";
  // }
  // // cta.style.color = cardDark;

  // for (var i = 0; i < userName.length; i++) {
  //   userName[i].style.color = "#fff";
  // }
  // // for (var i = 0; i < badges.length; i++) {
  // //   badges[i].style.color = "#fff";
  // // }

  // for (var i = 0; i < navigationheader.length; i++) {
  //   navigationheader[i].style.color = "#fff";
  // }
  // for (var i = 0; i < sectionLabel.length; i++) {
  //   sectionLabel[i].style.color = "#fff";
  // }
  // for (var i = 0; i < dropdownItem.length; i++) {
  //   dropdownItem[i].style.color = "#fff";
  // }
  // for (var i = 0; i < subsub.length; i++) {
  //   subsub[i].style.backgroundColor = textoAzul;
  //   subsub[i].style.color = "#fff";
  // }
  // for (var i = 0; i < userStatus.length; i++) {
  //   userStatus[i].style.color = "#fff";
  // }
  // for (var i = 0; i < inputGroup.length; i++) {
  //   inputGroup[i].style.backgroundColor = formInputsDark;
  //   inputGroup[i].style.color = "#fff";
  // }
  // for (var i = 0; i < inputGroupMerge.length; i++) {
  //   inputGroupMerge[i].style.backgroundColor = formInputsDark;
  //   inputGroupMerge[i].style.color = "#fff";
  // }
  // for (var i = 0; i < inputGoupText.length; i++) {
  //   inputGoupText[i].style.backgroundColor = formInputsDark;
  //   inputGoupText[i].style.color = "#fff";
  // }
  // for (var i = 0; i < formSelect.length; i++) {
  //   formSelect[i].style.backgroundColor = formInputsDark;
  //   formSelect[i].style.color = "#fff";
  // }
  // for (var i = 0; i < qlToolbar.length; i++) {
  //   qlToolbar[i].style.backgroundColor = formInputsDark;
  //   qlToolbar[i].style.color = "#fff";
  // }
  // for (var i = 0; i < dropdown.length; i++) {
  //   dropdown[i].style.backgroundColor = cardContentDark;
  //   dropdown[i].style.color = "#fff";
  // }
  // for (var i = 0; i < navContainer.length; i++) {
  //   navContainer[i].style.backgroundColor = cardDark;
  // }
  // for (var i = 0; i < navLink.length; i++) {
  //   navLink[i].style.color = textoBranco;
  // }
  // for (var i = 0; i < searchInput.length; i++) {
  //   searchInput[i].style.backgroundColor = "#1f1f1f";
  // }
  // for (var i = 0; i < blogCategoryTitle.length; i++) {
  //   blogCategoryTitle[i].style.color = "#fff";
  // }
  // for (var i = 0; i < tags.length; i++) {
  //   tags[i].style.color = "gray";
  // }

  // const svg = document.querySelectorAll("svg");
  // svg.forEach((svg) => {
  //   svg.style.color = textoBranco;
  // });
  // // cards
  // for (var i = 0; i < cards.length; i++) {
  //   cards[i].style.backgroundColor = cardDark;
  //   cards[i].style.boxShadow = "#433f3f 0px 0px 36px 6px !important;";
  // }
  // for (var i = 0; i < swiperSlide.length; i++) {
  //   swiperSlide[i].style.backgroundColor = cardContentDark;
  // }
  // for (var i = 0; i < profileHeaderNav.length; i++) {
  //   profileHeaderNav[i].style.backgroundColor = cardContentDark;
  // }

  // for (var i = 0; i < sidebar.length; i++) {
  //   sidebar[i].style.backgroundColor = cardContentDark;
  // }

  // for (var i = 0; i < listGroupItem.length; i++) {
  //   listGroupItem[i].style.backgroundColor = cardContentDark;
  // }
  // for (var i = 0; i < todoItem.length; i++) {
  //   todoItem[i].style.backgroundColor = cardContentDark;
  // }

  // for (var i = 0; i < appFixedSearch.length; i++) {
  //   appFixedSearch[i].style.backgroundColor = cardContentDark;
  // }

  // for (var i = 0; i < kanbanItem.length; i++) {
  //   kanbanItem[i].style.backgroundColor = cardContentDark;
  // }

  // for (var i = 0; i < modalDialog.length; i++) {
  //   modalDialog[i].style.backgroundColor = cardContentDark;
  // }

  // for (var i = 0; i < modalTitle.length; i++) {
  //   modalTitle[i].style.backgroundColor = cardContentDark;
  // }
  // for (var i = 0; i < offcanvas.length; i++) {
  //   offcanvas[i].style.backgroundColor = cardContentDark;
  // }


  // for (var i = 0; i < navbarFloating.length; i++) {
  //   navbarFloating[i].style.background = "#25293c";
  // }
  // for (var i = 0; i < accordion.length; i++) {
  //   accordion[i].style.background = bodyDark;
  // }
  // for (var i = 0; i < open.length; i++) {
  //   open[i].style.backgroundColor = bodyDark;
  // }

  // for (var i = 0; i < accordionBody.length; i++) {
  //   accordionBody[i].style.background = bodyDark;
  // }

  // for (var i = 0; i < headerNavbarShadow.length; i++) {
  //   headerNavbarShadow[i].style.background = bodyDark;
  // }
  // for (var i = 0; i < headerNavbar.length; i++) {
  //   headerNavbar[i].style.background = cardDark;
  // }
  // for (var i = 0; i < colFormLabel.length; i++) {
  //   colFormLabel[i].style.color = "#fff";
  // }

  // for (var i = 0; i < navigation.length; i++) {
  //   navigation[i].style.background = menuDark;
  // }
  // for (var i = 0; i < mainMenu.length; i++) {
  //   mainMenu[i].style.background = menuDark;
  // }
  // // document.body.style.backgroundColor = bodyDark;

  // for (var i = 0; i < textBody.length; i++) {
  //   textBody[i].style.backgroundColor = "#fff !important";
  // }
  
  // for (var i = 0; i < pagination.length; i++) {
  //   pagination[i].style.backgroundColor = "#303134 !important";
  // }
  // for (let i = 0; i < elements.length; i++) {
  //   elements[i].style.color = "#fff";
  // }
  // const notBadge = document.querySelectorAll("#notBadge");
  // notBadge.forEach((notBadge) => {
  //   notBadge.style.color = "#ffffff !important";
  // });

  //   setCookie("theme", "Dark", 30);
}

function changeLight() {
//   for (var i = 0; i < appContent.length; i++) {
//     appContent[i].style.backgroundColor = bodyLight;
//   }

//   const h1Elements = document.querySelectorAll("h1");
//   h1Elements.forEach((h1) => {
//     h1.style.color = textoCinzaEscuro;
//   });
//   const h2Elements = document.querySelectorAll("h2");
//   h2Elements.forEach((h2) => {
//     h2.style.color = textoCinza;
//   });
//   const h3Elements = document.querySelectorAll("h3");
//   h3Elements.forEach((h3) => {
//     h3.style.color = textoCinzaEscuro;
//   });
//   const h4Elements = document.querySelectorAll("h4");
//   h4Elements.forEach((h4) => {
//     h4.style.color = textoCinzaEscuro;
//   });
//   const h5Elements = document.querySelectorAll("h5");
//   h5Elements.forEach((h5) => {
//     h5.style.color = textoCinza;
//   });
//   const h6Elements = document.querySelectorAll("h6");
//   h6Elements.forEach((h6) => {
//     h6.style.color = textoCinza;
//   });
//   const buttons = document.querySelectorAll("button");
//   buttons.forEach((button) => {
//     button.style.color = textoCinza;
//   });
//   const li = document.querySelectorAll("li");
//   li.forEach((li) => {
//     li.style.color = textoCinza;
//   });
//   const svg = document.querySelectorAll("svg");
//   svg.forEach((svg) => {
//     svg.style.color = textoCinza;
//   });
//   const body = document.querySelector("body");

//     body.style.backgroundColor = "#f8f8f8 !important";
  
//   const inputs = document.getElementsByTagName('input');
//   for (let i = 0; i < inputs.length; i++) {
//       if (inputs[i].disabled) {
//           inputs[i].style.backgroundColor = inputsDisabledLight; // Defina a cor desejada aqui
//       }
//   }
//   const a = document.querySelectorAll("a");
//   a.forEach((a) => {
//     a.style.color = "#27282B";
//   });
//   for (var i = 0; i < sectionLabel.length; i++) {
//     sectionLabel[i].style.color = textoCinza;
//   }
//   const p = document.querySelectorAll("p");
//   p.forEach((p) => {
//     p.style.color = textoCinza;
//   });
//   const title = document.querySelectorAll("title");
//   title.forEach((title) => {
//     title.style.color = textoCinza;
//   });
//   const tspan = document.querySelectorAll("tspan");
//   tspan.forEach((tspan) => {
//     tspan.style.color = textoCinza;
//   });
//   // const span = document.querySelectorAll("span");
//   // span.forEach((span) => {
//   //     span.style.color = textoCinza;
//   // });
//   const strong = document.querySelectorAll("strong");
//   strong.forEach((strong) => {
//     strong.style.color = textoCinza;
//   });
  
//   for (var i = 0; i < navigationheader.length; i++) {
//     navigationheader[i].style.color = textoCinza;
//   }

//   // swiperSlide.style.backgroundColor = "#f8f8f8";
//   // var cardContent = document.getElementsByClassName("card-content");

//   // for (var i = 0; i < content.length; i++) {
//   //     content[i].style.backgroundColor = bodyLight;
//   // }
//   //   for (var i = 0; i < appContent.length; i++) {
//   //     appContent[i].style.backgroundColor = bodyLight;
//   //   }
//   //    formularios
//   for (var i = 0; i < formControl.length; i++) {
//     formControl[i].style.backgroundColor = formInputsLight;
//     formControl[i].style.color = "#27282B";
//   }
//   for (var i = 0; i < inputGroup.length; i++) {
//     inputGroup[i].style.backgroundColor = formInputsLight;
//     inputGroup[i].style.color = "#27282B";
//   }
//   for (var i = 0; i < inputGroupMerge.length; i++) {
//     inputGroupMerge[i].style.backgroundColor = formInputsLight;
//     inputGroupMerge[i].style.color = "#27282B";
//   }
//   for (var i = 0; i < tags.length; i++) {
//     tags[i].style.color = "gray";
//   }
//   for (var i = 0; i < inputGoupText.length; i++) {
//     inputGoupText[i].style.backgroundColor = formInputsLight;
//     inputGoupText[i].style.color = "#27282B";
//   }
//   for (var i = 0; i < formSelect.length; i++) {
//     formSelect[i].style.backgroundColor = formInputsLight;
//     formSelect[i].style.color = "#27282B";
//   }
//   for (var i = 0; i < qlToolbar.length; i++) {
//     qlToolbar[i].style.backgroundColor = formInputsLight;
//     qlToolbar[i].style.color = "#27282B";
//   }
//   for (var i = 0; i < dropdown.length; i++) {
//     dropdown[i].style.backgroundColor = cardContentLight;
//     dropdown[i].style.color = "#27282B";
//   }
  
//   for (var i = 0; i < navContainer.length; i++) {
//       navContainer[i].style.backgroundColor = cardLight;
//   }
//   for (var i = 0; i < navLink.length; i++) {
//     navLink[i].style.color = textoCinza;
//   }
//   for (var i = 0; i < searchInput.length; i++) {
//     searchInput[i].style.backgroundColor = cardLight;
//   }
//   for (var i = 0; i < blogCategoryTitle.length; i++) {
//     blogCategoryTitle[i].style.color = "#27282B";
//   }

//   // cards
//   for (var i = 0; i < cards.length; i++) {
//     cards[i].style.backgroundColor = cardLight;
//   }
//   for (var i = 0; i < swiperSlide.length; i++) {
//     swiperSlide[i].style.backgroundColor = cardContentLight;
//   }
//   for (var i = 0; i < profileHeaderNav.length; i++) {
//     profileHeaderNav[i].style.backgroundColor = cardContentLight;
//   }

//   for (var i = 0; i < sidebar.length; i++) {
//     sidebar[i].style.backgroundColor = cardContentLight;
//   }

//   for (var i = 0; i < listGroupItem.length; i++) {
//     listGroupItem[i].style.backgroundColor = cardContentLight;
//   }
//   for (var i = 0; i < todoItem.length; i++) {
//     todoItem[i].style.backgroundColor = cardContentLight;
//   }

//   for (var i = 0; i < appFixedSearch.length; i++) {
//     appFixedSearch[i].style.backgroundColor = cardContentLight;
//   }

//   for (var i = 0; i < kanbanItem.length; i++) {
//     kanbanItem[i].style.backgroundColor = cardContentLight;
//   }

//   for (var i = 0; i < modalDialog.length; i++) {
//     modalDialog[i].style.backgroundColor = cardContentLight;
//   }

//   for (var i = 0; i < modalTitle.length; i++) {
//     modalTitle[i].style.backgroundColor = cardContentLight;
//   }
//   for (var i = 0; i < offcanvas.length; i++) {
//     offcanvas[i].style.backgroundColor = cardContentLight;
//   }

//   for (var i = 0; i < shadow.length; i++) {
//     shadow[i].style.background = shadowLight;
//   }

//   for (var i = 0; i < navbarFloating.length; i++) {
//     navbarFloating[i].style.background = "#25293c";
//   }
//   for (var i = 0; i < accordion.length; i++) {
//     accordion[i].style.background = bodyLight;
//   }
//   for (var i = 0; i < open.length; i++) {
//     open[i].style.backgroundColor = bodyLight;
//   }

//   for (var i = 0; i < accordionBody.length; i++) {
//     accordionBody[i].style.background = "#fff";
//   }

//   for (var i = 0; i < headerNavbar.length; i++) {
//     headerNavbar[i].style.background = cardLight;
//   }
//   for (var i = 0; i < headerNavbarShadow.length; i++) {
//     headerNavbarShadow[i].style.background = bodyLight;
//   }
//   for (var i = 0; i < colFormLabel.length; i++) {
//     colFormLabel[i].style.color = "#27282B";
//   }

//   for (var i = 0; i < navigation.length; i++) {
//     navigation[i].style.background = menuLight;
//   }
//   for (var i = 0; i < mainMenu.length; i++) {
//     mainMenu[i].style.background = menuLight;
//   }
//   // document.body.style.backgroundColor = bodyLight;

//   for (var i = 0; i < textBody.length; i++) {
//     textBody[i].style.backgroundColor = "#27282B !important";

//     // textBody[i].style.setProperty("color", "#27282B", " !important");
//   }

//   for (var i = 0; i < dropdownItem.length; i++) {
//     dropdownItem[i].style.color = "#27282B";
//   }

//   for (var i = 0; i < pagination.length; i++) {
//     pagination[i].style.backgroundColor = "#303134 !important";
//   }

//   for (var i = 0; i < userName.length; i++) {
//     userName[i].style.color = "#27282B";
//   }
//   for (var i = 0; i < userStatus.length; i++) {
//     userStatus[i].style.color = "#27282B";
//   }
//   // for (var i = 0; i < badges.length; i++) {
//   //   badges[i].style.color = textoCinza;
//   // }
//   for (var i = 0; i < cards.length; i++) {
//     cards[i].style.backgroundColor = cardDark;
//     cards[i].style.boxShadow = "rgb(242, 242, 242) 0px 0px 36px 6px !important;";
//   }
// //   for (var i = 0; i < cta.length; i++) {
// //     cta[i].style.color = cardDark;
// //   }
//   for (let i = 0; i < elements.length; i++) {
//     elements[i].style.color = "#fff";
//   }
//   const notBadge = document.querySelectorAll("#notBadge");
//   notBadge.forEach((notBadge) => {
//     notBadge.style.color = "#ffffff !important";
//   });
//   //   setCookie("theme", "Light", 30);
}
