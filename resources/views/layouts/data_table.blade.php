<script>
"use strict";

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

// delay keyup
function delay(fn, ms) {
  let timer = 0
  return function(...args) {
    clearTimeout(timer)
    timer = setTimeout(fn.bind(this, ...args), ms || 0)
  }
}

// DataTables Demo
// =============================================================
var DataTablesDemo = /*#__PURE__*/function () {
  function DataTablesDemo() {
    _classCallCheck(this, DataTablesDemo);

    this.init();
  }

  _createClass(DataTablesDemo, [{
    key: "init",
    value: function init() {
      // event handlers
      this.table = this.table();
      this.searchRecords();
      this.selecter();
      this.clearSelected();

      this.table.buttons().container().appendTo('#dt-buttons').unwrap();
      // Delete a record
      this.table.on('click', '.remove', function(e) {
          $('#delete_confirmation').modal('show');
          $('#id_delete').val($(this).attr('data-id'))
          e.preventDefault();
      });
      // Restore a record
      this.table.on('click', '.restore', function(e) {
          $('#restore_confirmation').modal('show');
          $('#id_restore').val($(this).attr('data-id'))
          e.preventDefault();
      });
    }
  }, {
    key: "table",
    value: function table() {
      return $('#myTable').DataTable({
        dom: "<'text-muted'Bi>\n        <'table-responsive'tr>\n        <'mt-4'p>",
        buttons: ['copyHtml5', {
          extend: 'print',
          autoPrint: false
        }],
        language: {
          paginate: {
            previous: '<i class="fa fa-lg fa-angle-left"></i>',
            next: '<i class="fa fa-lg fa-angle-right"></i>'
          }
        },
        autoWidth: false,
        serverSide: true,
        deferRender: true,
        autoWidth: false,
        ajax: {
            url: "{{ route('gudang.show.get_barang') }}",
            data: function (d) {
                d.filter = $('#filterBy').val(),
                d.search = $('#table-search').val()
                d.type = $('.tab-link.active').attr('data-value')
            }
        },
        order: [1, 'asc'],
        columns: [
          {
            data: 'id',
            className: 'col-checker align-middle',
            orderable: false,
            searchable: false
        }, 
        {
            data: 'nama_barang',
            name: 'nama_barang',
            className: 'align-middle'
        }, {
            data: 'kode_scan',
            name: 'kode_scan',
            className: 'align-middle'
        }, {
            data: 'harga_satuan',
            name: 'harga_satuan',
            className: 'align-middle'
        }, {
            data: 'harga_jual',
            name: 'harga_jual',
            className: 'align-middle'
        }, {
            data: 'stok',
            name: 'stok',
            className: 'align-middle'
        }, 
        {
            data: 'id',
            className: 'align-middle text-right',
            orderable: false,
            searchable: false
        }
      ],
        columnDefs: [
          {
            targets: 0,
            "visible": false,
            render: function render(data, type, row, meta) {
                return "<div class=\"custom-control custom-control-nolabel custom-checkbox\">\n            <input type=\"checkbox\" class=\"custom-control-input\" name=\"selectedRow[]\" id=\"p".concat(row.id, "\" value=\"").concat(row.id, "\">\n            <label class=\"custom-control-label\" for=\"p").concat(row.id, "\"></label>\n          </div>");
            }
        }, 
        {
            targets: 1,
            render: function render(data, type, row, meta) {
                return "<a href=\"{{ route('gudang.show') }}/".concat(row.id, "\" class=\"tile tile-img mr-1\">\n            <img class=\"img-fluid\" src=\"{{asset('storage')}}/").concat((row.gambar != null ? row.gambar : 'no-image.png'), "\" alt=\"Card image cap\">\n          </a>\n          <a href=\"{{ route('gudang.show') }}/").concat(row.id, "\">").concat(row.nama_barang, "</a>");
            }
        }, {
            targets: 6,
            render: function render(data, type, row, meta) {
              if (row.deleted_at != null) {
                return "<a class=\"btn btn-sm btn-icon btn-secondary edit\" href=\"{{ route('gudang.show') }}"+"/"+row.id+"\" data-id=\"".concat(row.id, "\"><i class=\"fa fa-pencil-alt\"></i></a>\n          <a class=\"btn btn-sm btn-icon btn-secondary remove\" href=\"javascript:void()\" data-id=\"").concat(row.id, "\"><i class=\"far fa-trash-alt\"></i></a>\n          <a class=\"btn btn-sm btn-icon btn-secondary restore\" href=\"javascript:void()\" data-id=\"").concat(row.id, "\"><i class=\"fa-solid fa-trash-arrow-up\"></i></a>");
              } else {
                return "<a class=\"btn btn-sm btn-icon btn-secondary edit\" href=\"{{ route('gudang.show') }}"+"/"+row.id+"\" data-id=\"".concat(row.id, "\"><i class=\"fa fa-pencil-alt\"></i></a>\n          <a class=\"btn btn-sm btn-icon btn-secondary remove\" href=\"javascript:void()\" data-id=\"").concat(row.id, "\"><i class=\"far fa-trash-alt\"></i></a>");
              }
            }
        }]
      });
    }
  }, {
    key: "searchRecords",
    value: function searchRecords() {
      var self = this;
      $('#table-search, #filterBy').on('keyup change', delay(function (e) {
        var filterBy = $('#filterBy').val();
        var hasFilter = filterBy !== '';
        var value = $('#table-search').val(); // clear selected rows

        if (value.length && (e.type === 'keyup' || e.type === 'change')) {
          self.clearSelectedRows();
        } // reset search term


        self.table.draw();
      }, 500));
    }
  }, {
    key: "getSelectedInfo",
    value: function getSelectedInfo() {
      var $selectedRow = $('input[name="selectedRow[]"]:checked').length;
      var $info = $('.thead-btn');
      var $badge = $('<span/>').addClass('selected-row-info text-muted pl-1').text("".concat($selectedRow, " selected")); // remove existing info

      $('.selected-row-info').remove(); // add current info

      if ($selectedRow) {
        $info.prepend($badge);
      }
    }
  }, {
    key: "selecter",
    value: function selecter() {
      var self = this;
      $(document).on('change', '#check-handle', function () {
        var isChecked = $(this).prop('checked');
        $('input[name="selectedRow[]"]').prop('checked', isChecked); // get info

        self.getSelectedInfo();
      }).on('change', 'input[name="selectedRow[]"]', function () {
        var $selectors = $('input[name="selectedRow[]"]');
        var $selectedRow = $('input[name="selectedRow[]"]:checked').length;
        var prop = $selectedRow === $selectors.length ? 'checked' : 'indeterminate'; // reset props

        $('#check-handle').prop('indeterminate', false).prop('checked', false);

        if ($selectedRow) {
          $('#check-handle').prop(prop, true);
        } // get info


        self.getSelectedInfo();
      });
    }
  }, {
    key: "clearSelected",
    value: function clearSelected() {
      var self = this; // clear selected rows

      $('#myTable').on('page.dt', function () {
        self.clearSelectedRows();
      });
      $('#clear-search').on('click', function () {
        self.clearSelectedRows();
      });
    }
  }, {
    key: "clearSelectedRows",
    value: function clearSelectedRows() {
      $('#check-handle').prop('indeterminate', false).prop('checked', false).trigger('change');
    }
  }]);

  return DataTablesDemo;
}();
/**
 * Keep in mind that your scripts may not always be executed after the theme is completely ready,
 * you might need to observe the `theme:load` event to make sure your scripts are executed after the theme is ready.
 */


$(document).ready(function () {
  new DataTablesDemo();
  $('.tab-link').on('click', function(){
    setTimeout(
      function() 
      {
        $('#myTable').DataTable().clear().draw();
      }, 100);
  });
});
</script>