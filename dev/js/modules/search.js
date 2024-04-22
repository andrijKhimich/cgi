
$(document).ready(function () {
  const toggleSearchForm = () => {
    const searchBtn = $('.js-header-search__btn');
    const searchForm = $('.js-header-search__form');
    const searchInput = $('.js-header-search__form input');

    searchBtn.click(() => {
      searchBtn.toggleClass('active');
      searchForm.toggleClass('active');
      searchInput.val('');
    });
  }

  toggleSearchForm();

  $('#search-input').autocomplete({
    minLength: 2,
    appendTo: $('.js-header-search'),
    source: function (request, response) {
      $.ajax({
        url: ajax_object.ajax_url,
        type: 'POST',
        dataType: 'json',
        data: {
          action: 'search_autocomplete',
          term: request.term
        },
        success: function (data) {
          response($.map(data, function (item) {
            return {
              label: item.title,
              value: item.title,
              link: ajax_object.search_url + '?s=' + encodeURIComponent(item.title)
            };
          }));
        }
      });
    },
    select: function (event, ui) {
      window.location.href = ui.item.link;
    }
  }).autocomplete('instance')._renderItem = function (ul, item) {
    return $('<li>')
      .append('<a href="' + item.link + '">' + item.label + '</a>')
      .appendTo(ul);
  };

});
