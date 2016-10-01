export default class MobileNav {
  constructor(el) {
    this.$el = $(el)
    this.burger = ".Burger"
    this.attachEvents()
  }

  attachEvents() {
    this.$el.on('click', this.burger, (event) => {
      event.preventDefault()
      $(event.target).toggleClass('Burger--morph')
    })
  }
}
