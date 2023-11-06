/*========= Flip Button Services =========*/

const boxes = document.querySelectorAll('.flip-box-inner')

for (const box of boxes) {
  box.addEventListener('click', function handleClick() {
    box.classList.toggle('animate')
  })
}

/*========= Scroll Reveal =========*/

ScrollReveal({
  reset: true,
  origin: 'top',
  distance: '30px',
  duration: 800
}).reveal(`
#home .col-a,
#home .col-b,
#about-us .col-a,
#about-us .col-b,
#about-us .col-c,
.cards,
#about .col-b,
.stats,
.flip-box,
#form .col-a,
#form .col-b,
.steps,
.user-box `)

/*========= / Scroll Reveal =========*/

window.addEventListener('scroll', onScroll)

onScroll()

function onScroll() {
  colorNavOnScroll()
  showButtonToTop()
  fixedMenuOnScroll()

  activateMenuAtCurrentSection(home)
  activateMenuAtCurrentSection(services)
  activateMenuAtCurrentSection(about)
  activateMenuAtCurrentSection(contact)
}

function activateMenuAtCurrentSection(section) {
  const targetLine = scrollY + innerHeight / 2

  //verificar se a seção passou da linha alvo

  const sectionTop = section.offsetTop
  const sectionHeight = section.offsetHeight

  const sectionTopReachOrPassedTargetLine = targetLine >= sectionTop

  // verificar se a base passou da linha alvo

  const sectionEndsAt = sectionTop + sectionHeight

  const sectionEndPassedTargetline = sectionEndsAt <= targetLine

  // limites da seção
  const sectionBoundaries =
    sectionTopReachOrPassedTargetLine && !sectionEndPassedTargetline

  const sectionId = section.getAttribute('id')
  const menuElement = document.querySelector(`.menu a[href*=${sectionId}]`)

  menuElement.classList.remove('active')
  if (sectionBoundaries) {
    menuElement.classList.add('active')
  }
}

function colorNavOnScroll() {
  if (scrollY > 0) {
    navigationn.classList.add('scroll')
  } else {
    navigationn.classList.remove('scroll')
  }
}

function showButtonToTop() {
  if (scrollY > 400) {
    backToTopButton.classList.add('show')
  } else {
    backToTopButton.classList.remove('show')
  }
}

function openMenu() {
  document.body.classList.add('menu-expanded')
}

function closeMenu() {
  document.body.classList.remove('menu-expanded')
}

/*========= Menu Fixed =========*/
function fixedMenuOnScroll() {
  if (scrollY > 75) {
    navigationn.classList.add('fixed-menu')
  } else navigationn.classList.remove('fixed-menu')
}
