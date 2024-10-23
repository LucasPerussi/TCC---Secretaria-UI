(function (window, document, $) {
    'use strict';
  
    var select = $('.select2'),
      selectIcons = $('.select2-icons'),
      maxLength = $('.max-length'),
      hideSearch = $('.hide-search'),
      selectArray = $('.select2-data-array'),
      selectAjax = $('.select2-data-ajax'),
      selectLg = $('.select2-size-lg'),
      selectSm = $('.select2-size-sm'),
      selectInModal = $('.select2InModal');
  
    // Default Select2 Initialization
    select.each(function () {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>');
      $this.select2({
        dropdownAutoWidth: true,
        width: '100%',
        dropdownParent: $this.parent()
      });
    });
  
    // Select With Icon
    selectIcons.each(function () {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>');
      $this.select2({
        dropdownAutoWidth: true,
        width: '100%',
        minimumResultsForSearch: Infinity,
        dropdownParent: $this.parent(),
        templateResult: iconFormat,
        templateSelection: iconFormat,
        escapeMarkup: function (es) {
          return es;
        }
      });
    });
  
    // Format icon using Bootstrap Icons
    function iconFormat(icon) {
      if (!icon.id) {
        return icon.text;
      }
  
      var iconClass = $(icon.element).data('icon');
      var $icon = '<i class="bi bi-' + iconClass + ' me-50"></i>' + icon.text;
  
      return $icon;
    }
  
    // Limiting the number of selections
    maxLength.wrap('<div class="position-relative"></div>').select2({
      dropdownAutoWidth: true,
      width: '100%',
      maximumSelectionLength: 2,
      dropdownParent: maxLength.parent(),
      placeholder: 'Select maximum 2 items'
    });
  
    // Hide Search Box
    hideSearch.select2({
      placeholder: 'Select an option',
      minimumResultsForSearch: Infinity
    });
  
    // Loading array data
    var data = [
      { id: 0, text: 'enhancement' },
      { id: 1, text: 'bug' },
      { id: 2, text: 'duplicate' },
      { id: 3, text: 'invalid' },
      { id: 4, text: 'wontfix' }
    ];
  
    selectArray.wrap('<div class="position-relative"></div>').select2({
      dropdownAutoWidth: true,
      dropdownParent: selectArray.parent(),
      width: '100%',
      data: data
    });
  
    // Loading remote data
    selectAjax.wrap('<div class="position-relative"></div>').select2({
      dropdownAutoWidth: true,
      dropdownParent: selectAjax.parent(),
      width: '100%',
      ajax: {
        url: 'https://api.github.com/search/repositories',
        dataType: 'json',
        delay: 250,
        data: function (params) {
          return {
            q: params.term, // search term
            page: params.page
          };
        },
        processResults: function (data, params) {
          params.page = params.page || 1;
  
          return {
            results: data.items,
            pagination: {
              more: params.page * 30 < data.total_count
            }
          };
        },
        cache: true
      },
      placeholder: 'Search for a repository',
      escapeMarkup: function (markup) {
        return markup;
      },
      minimumInputLength: 1,
      templateResult: formatRepo,
      templateSelection: formatRepoSelection
    });
  
    function formatRepo(repo) {
      if (repo.loading) return repo.text;
  
      var markup =
        "<div class='select2-result-repository clearfix'>" +
        "<div class='select2-result-repository__avatar'><img src='" +
        repo.owner.avatar_url +
        "' /></div>" +
        "<div class='select2-result-repository__meta'>" +
        "<div class='select2-result-repository__title'>" +
        repo.full_name +
        '</div>';
  
      if (repo.description) {
        markup += "<div class='select2-result-repository__description'>" + repo.description + '</div>';
      }
  
      markup +=
        "<div class='select2-result-repository__statistics'>" +
        "<div class='select2-result-repository__forks'>" +
        '<i class="bi bi-share me-50"></i>' +
        repo.forks_count +
        ' Forks</div>' +
        "<div class='select2-result-repository__stargazers'>" +
        '<i class="bi bi-star me-50"></i>' +
        repo.stargazers_count +
        ' Stars</div>' +
        "<div class='select2-result-repository__watchers'>" +
        '<i class="bi bi-eye me-50"></i>' +
        repo.watchers_count +
        ' Watchers</div>' +
        '</div>' +
        '</div></div>';
  
      return markup;
    }
  
    function formatRepoSelection(repo) {
      return repo.full_name || repo.text;
    }
  
    // Large Select2
    selectLg.each(function () {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>');
      $this.select2({
        dropdownAutoWidth: true,
        dropdownParent: $this.parent(),
        width: '100%',
        containerCssClass: 'select-lg'
      });
    });
  
    // Small Select2
    selectSm.each(function () {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>');
      $this.select2({
        dropdownAutoWidth: true,
        dropdownParent: $this.parent(),
        width: '100%',
        containerCssClass: 'select-sm'
      });
    });
  
    // Select2 in Modal
    $('#select2InModal').on('shown.bs.modal', function () {
      selectInModal.select2({
        placeholder: 'Select a state'
      });
    });
  })(window, document, jQuery);
  