import Flickity from 'flickity-bg-lazyload'

export default class Hero {
  constructor(el) {
    this.$el = $(el)
    this.cellName = '.Hero-image'
    this.$arrows = $(".Hero").find('.Arrows')
    this.hero = new Flickity (el, {
      cellSelector: this.cellName,
      wrapAround: true,
      pageDots: false,
      adaptiveHeight: false,
      bgLazyLoad: 1,
      autoPlay: 8000,
      pauseAutoPlayOnHover: true
    })
    // this.featuredEventsData = Flickity.data(el)
    // this.attachEvents()
    // this.showFirstCell()
  }

  attachEvents() {
    this.featuredEvents.on( 'select', () => {
      this.displayContent( this.featuredEventsData.selectedIndex )
    })
    this.$arrows.on('click', '.Flickity-prev', (event) => {
      event.preventDefault()
      this.featuredEvents.previous()
    })
    .on('click', '.Flickity-next', (event) => {
      event.preventDefault()
      this.featuredEvents.next()
    })

    // Pause flickity if user is reading
    $(".FeaturedEvents-body").hover(() => {
      this.featuredEvents.pausePlayer()
    }, () => {
      this.featuredEvents.unpausePlayer()
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
