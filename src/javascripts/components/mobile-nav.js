export default class MobileNav {
  constructor(el) {
    this.$el = $(el)
    this.$body = $("body")
    this.burger = ".MobileNav-burger"
    this.$burger = $(".Burger")
    this.$nav = $(".MobileNav")
    this.$panel = $(".MobilePanel")
    this.search = ".MobileNav-search"
    this.$searchbar = $(".SearchBar")
    this.navOpen = false
    this.searchOpen = false
    this.attachEvents()
  }

  attachEvents() {
    // Escape should close the mobile menu
    $(document).on('keyup', (key) => {
      if (key.keyCode == 27 && this.isSearchOpen) {

      }
      if (key.keyCode == 27 && this.isOpen) {

      }
    })
    this.$el.on('click', this.burger, (event) => {
      event.preventDefault()
      if (!this.navOpen) {
        this.navOpen = !this.navOpen
        this.$body.addClass('noScroll')
        this.$burger.addClass('Burger--morph')
        this.$nav.addClass('MobileNav--open')
        this.$panel.addClass('MobilePanel--open')
      } else {
        // Already opened
        this.navOpen = !this.navOpen
        this.$body.removeClass('noScroll')
        this.$burger.removeClass('Burger--morph')
        this.$panel.removeClass('MobilePanel--open')
        this.$nav.removeClass('MobileNav--open')
      }
      // $(event.target).toggleClass('Burger--morph')
    })
    .on('click', this.search, (event) => {
      event.preventDefault()
      if (!this.searchOpen) {
        this.searchOpen = !this.searchOpen
        this.$searchbar.addClass('SearchBar--open')
        setTimeout( () => {
          $("#SearchBar-input").focus()
        }, 300)
      } else {
        this.searchOpen = !this.searchOpen
        $("#SearchBar-input").blur()
        this.$searchbar.removeClass('SearchBar--open')
      }
    })
  }
}
