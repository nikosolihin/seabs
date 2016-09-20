import Flickity from 'flickity-bg-lazyload'

export default class Gallery {
  constructor(el) {
    this.$el = $(el)
    this.cellName = '.FeaturedEvents-image'
    this.gallery = new Flickity (el, {
      cellSelector: this.cellName,
      callAlign: 'left',
      draggable: false,
      pageDots: false,
      prevNextButtons: false,
      wrapAround: true,
      adaptiveHeight: false,
      bgLazyLoad: 1,
      autoPlay: 8000,
      pauseAutoPlayOnHover: false
    })
    this.galleryData = Flickity.data(el)
    this.attachEvents()
    this.showFirstCell()
  }

  attachEvents() {
    this.gallery.on( 'select', () => {
      this.displayContent( this.galleryData.selectedIndex )
    })

    $(".FeaturedEvents-nav").on('click', '.Flickity-prev', (event) => {
      event.preventDefault()
      this.gallery.previous()
    })
    .on('click', '.Flickity-next', (event) => {
      event.preventDefault()
      this.gallery.next()
    })

    // Pause flickity if user is reading
    $(".FeaturedEvents-body").hover(() => {
      this.gallery.pausePlayer()
    }, () => {
      this.gallery.unpausePlayer()
    })
  }

  showFirstCell() {
    $('.FeaturedEvents-content[data-content-id="0"').addClass('FeaturedEvents-content--show')
  }

  displayContent( index ) {
    $(".FeaturedEvents-content--show").removeClass('FeaturedEvents-content--show')
    $('.FeaturedEvents-content[data-content-id="'+ index +'"]').addClass('FeaturedEvents-content--show')
  }
}
