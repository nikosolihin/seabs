export default class Modal {
  constructor(el) {
    this.$el = $(el)
    this.$video = $(".welcome-video")
    this.$modal = $(".Modal")
    this.isOpen = false
    this.attachEvents()
  }

  attachEvents() {
    this.$el.on('click', (event) => {
      event.preventDefault()
      this.isOpen = true
      this.$video.get(0).pause()
      this.$modal.addClass('Modal--on')
    })
    this.$modal.on('click', (event) => {
      event.preventDefault()
      if (this.isOpen) {
        this.$modal.addClass('Modal--close').delay(150).queue(() => {
          this.$modal.removeClass('Modal--on').dequeue()
          this.$modal.removeClass('Modal--close').dequeue()
        })
        this.$video.get(0).play()
      }
    })
  }
}
