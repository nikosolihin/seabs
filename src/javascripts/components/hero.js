import Flickity from 'flickity-bg-lazyload'

export default class Hero {
  constructor(el) {
    this.$el = $(el)
    this.cellName = '.Hero-cell'
    this.hero = new Flickity (el, {
      cellSelector: this.cellName,
      wrapAround: true,
      pageDots: false,
      adaptiveHeight: false,
      bgLazyLoad: 1,
      autoPlay: 8000,
      pauseAutoPlayOnHover: true
    })
  }
}
