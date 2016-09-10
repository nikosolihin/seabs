import padStart from 'lodash/padstart'
import map from 'lodash/map'
import forEach from 'lodash/foreach'
import split from 'lodash/split'
import getQueryParams from '../lib/getQueryParams'
import paramReplace from '../lib/paramReplace'
import Mustache from 'mustache'
import moment from 'moment'

export default class Event {
  constructor(el) {
    this.$el = $(el)
    this.$loader = $("#Loader")
    // this.searchButton = "#searchResources"
    this.$resultArea = $(".ArchiveEvent-result")
    // this.$pagination = $(".Pagination-pages")
    // this.$sort = $(".searchResource-sort")

    // Options
    let options = this.$el.data('options')
    this.domain = options.domain
    this.label = options.label
    this.ppp = options.ppp
    this.allCategories = options.categories

    console.log(typeof(this.allCategories))

    // Index all type and topic tags
    // this.allYears = []
    // this.getAllTags()
    // this.getAllYears()

    // Get filters from URL & store them
    // this.queryString = location.search
    // let filters = getQueryParams()
    // this.page = filters.page === undefined ? '1' : filters.page
    // this.order = filters.order === undefined ? 'desc' : filters.order
    // this.types = filters.types === undefined ? [] : filters.types.split(',')
    // this.topics = filters.topics === undefined ? [] : filters.topics.split(',')
    // this.year = filters.yr === undefined ? 'any' : filters.yr
    // this.month = filters.month === undefined ? 'any' : filters.month

    // this.prepSidebar()
    // this.attachEvents()
    this.fetchResources()
  }
//
//   getAllTags() {
//     forEach( this.$el.find("[data-type-id]"), (data) => {
//       let id = $(data).data('typeId'),
//         text = $(data).text().trim()
//       this.allTypes[id] = text
//     })
//     forEach( this.$el.find("[data-topic-id]"), (data) => {
//       let id = $(data).data('topicId'),
//         text = $(data).text().trim()
//       this.allTopics[id] = text
//     })
//   }
//
//   getAllYears() {
//     forEach( $("#filter-yr option"), (option) => {
//       this.allYears[this.allYears.length] = option.value
//     })
//     this.allYears.sort().pop()
//   }
//
//   prepSidebar() {
//     $("#filter-yr").val( this.year ) // Year
//     $("#filter-month").val( this.month ) // Month
//     forEach( this.types, (tag) => { // Types
//       this.$el.find(".Pill[data-type-slug='"+ tag +"']").addClass('Pill--dark')
//     })
//     forEach( this.topics, (tag) => { // Topics
//       this.$el.find(".Checkbox[data-topic-slug='"+ tag +"']").addClass('Checkbox--checked')
//     })
//   }
//
//   attachEvents() {
//     this.$el.on('click', this.searchButton, (event) => {
//       event.preventDefault()
//       this.updateQueryStrings()
//       this.fetchResources()
//     })
//     .on('change', '#filter-yr', (event) => {
//       if ( $(event.target).val() == 'any' ) {
//         $("#filter-month").parent().toggleClass('Dropdown--hidden')
//       } else {
//         $(".Dropdown--hidden").toggleClass('Dropdown--hidden')
//       }
//     })
//     .on('click', '[data-type-slug]', (event) => {
//       event.preventDefault()
//       $(event.target).toggleClass('Pill--dark').toggleClass('Pill--toggled')
//     })
//     .on('click', '.Checkbox', (event) => {
//       event.preventDefault()
//       $(event.target).toggleClass('Checkbox--checked')
//     })
//     this.$pagination.on('click', '.Pagination-link', (event) => {
//       event.preventDefault()
//       window.scrollTo(0, 0)
//       this.handlePagination( $(event.target).text() )
//     })
//     this.$sort.on('click', 'a', (event) => {
//       event.preventDefault()
//       $(".sort-active").removeClass()
//       $(event.target).toggleClass('sort-active')
//       this.handleSort( $(event.target).attr('id').split("filter-").pop() )
//     })
//   }
//
//   updateQueryStrings() {
//     // Dates
//     this.year = $("#filter-yr").val()
//     this.month = $("#filter-month").val()
//
//     // Types
//     this.types = []
//     forEach( $(".Pill--dark"), (value) => {
//       this.types[this.types.length] = $(value).data('type-slug')
//     })
//     let types = this.types.join(','),
//       typeString = types ? `&types=${types}` : ''
//
//     // Topics
//     this.topics = []
//     forEach( $(".Checkbox--checked"), (value) => {
//       this.topics[this.topics.length] = $(value).data('topic-slug')
//     })
//     let topics = this.topics.join(','),
//       topicString = topics ? `&topics=${topics}` : ''
//
//     // Update URL
//     window.history.pushState(null, document.title, `?yr=${this.year}&month=${this.month}${typeString}${topicString}&order=${this.order}&page=${this.page}` )
//   }
//
  fetchResources() {
    let dataObject = {}
    // dataObject.filter = {}
    // dataObject.order = this.order
    // dataObject.page = this.page
    // dataObject.filter.posts_per_page = this.ppp
    // if (this.topics || this.types) {
    //   if (this.topics) {
    //     dataObject.filter.resource_topic = this.topics.join(',')
    //   }
    //   if (this.types) {
    //     dataObject.filter.resource_type = this.types.join(',')
    //   }
    // }

    if (this.year != 'any') {
      if (this.month != 'any') {
        if (this.month == 12) {
          dataObject.before = `${parseInt(this.year)+1}-01-01T00:00:00`
          dataObject.after = `${this.year}-${padStart(this.month, 2, '0')}-01T00:00:00`
        } else {
          dataObject.before = `${this.year}-${padStart(parseInt(this.month)+1, 2, '0')}-01T00:00:00`
          dataObject.after = `${this.year}-${padStart(this.month, 2, '0')}-01T00:00:00`
        }
      } else {
        dataObject.before = `${parseInt(this.year)+1}-01-01T00:00:00`
        dataObject.after = `${this.year}-01-01T00:00:00`
      }
    }

    $.ajax({
      url: `//${this.domain}/wp-json/wp/v2/events`,
      // data: dataObject,
      type: "GET",
      dataType : "json",
      beforeSend: () => {
        // this.$resultArea.toggleClass('searchResource--fadeOut')
        // this.$loader.toggleClass('Loader--show')
      }
    })
    .always( () => {
      // this.$resultArea.empty()
      // this.$pagination.empty()
      // this.$loader.toggleClass('Loader--show')
      // this.$resultArea.toggleClass('searchResource--fadeOut')
    })
    .done( (data, status, xhr) => {
      console.log(data)
      if (data.length) {
      //   $(".Pagination--hidden").toggleClass('Pagination--hidden')
        let totalPages = parseInt(xhr.getResponseHeader('x-wp-totalpages'))
        forEach(data, (obj) => {
          let templateVars = {
            id: obj.acf.id,
            title: obj.title.rendered,
            link: obj.link,
            date: moment(obj.date).format('MMMM D, YYYY'),
            teaser: obj.acf.teaser,
            image: obj.acf.image.url_z,
            label: this.label,
            category: this.allCategories[obj['events/categories']]
          }
          // templateVars.type = this.allTypes[obj['resources/types'][0]]
          // map(obj['resources/topics'], (id) => {
          //   templateVars.topics[templateVars.topics.length] = this.allTopics[id]
          // })
          // templateVars.topics = templateVars.topics.join(', ')
          this.renderResources(templateVars)
        })

      //   // Setup Pagination
      //   for (let i=1; i<=totalPages; i++) {
      //     if (i==this.page) {
      //       this.$pagination.append(`<li class="Pagination--current"><a class="Pagination-link" href="${this.queryString}&page=${i}">${i}</a></li>`)
      //     } else {
      //       this.$pagination.append(`<li><a class="Pagination-link" href="${this.queryString}&page=${i}">${i}</a></li>`)
      //     }
      //   }
      } else {
        this.renderResources({ empty: "No resources found. Please try again." })
      //   $(".Pagination").toggleClass('Pagination--hidden')
      }
    })
    .fail( (xhr, status, errorThrown) => {
      this.renderResources({ error: `${errorThrown}: ${status}` })
      // $(".Pagination").toggleClass('Pagination--hidden')
    })
  }

  renderResources(data) {
    let template = $("#MediaObject").html()
    Mustache.parse(template)
    this.$resultArea.append( Mustache.render(template, data) )
  }

//   handlePagination(pageNum) {
//     this.page = pageNum
//     // Update URL
//     window.history.pushState(null, document.title, paramReplace( location.search, 'page', pageNum) )
//     this.fetchResources()
//   }
//
//   handleSort(order) {
//     this.order = order
//     // Update URL
//     window.history.pushState(null, document.title, paramReplace( location.search, 'order', order) )
//     this.fetchResources()
//   }
}
