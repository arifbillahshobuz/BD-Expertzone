/**
 * Dashboard eCommerce
 */

'use strict';

document.addEventListener('DOMContentLoaded', function (e) {
  let cardColor, labelColor, headingColor, borderColor, legendColor, fontFamily;

  cardColor = config.colors.cardColor;
  labelColor = config.colors.textMuted;
  legendColor = config.colors.bodyColor;
  headingColor = config.colors.headingColor;
  borderColor = config.colors.borderColor;
  fontFamily = config.fontFamily;

  // Donut Chart Colors
  const chartColors = {
    donut: {
      series1: '#24B364',
      series2: '#53D28C',
      series3: '#7EDDA9',
      series4: '#A9E9C5'
    }
  };

  // Expenses Radial Bar Chart
  // --------------------------------------------------------------------
  const expensesRadialChartEl = document.querySelector('#expensesChart'),
    expensesRadialChartConfig = {
      chart: {
        height: 170,
        sparkline: {
          enabled: true
        },
        parentHeightOffset: 0,
        type: 'radialBar'
      },
      colors: [config.colors.warning],
      series: [78],
      plotOptions: {
        radialBar: {
          offsetY: 0,
          startAngle: -90,
          endAngle: 90,
          hollow: {
            size: '65%'
          },
          track: {
            strokeWidth: '45%',
            background: borderColor
          },
          dataLabels: {
            name: {
              show: false
            },
            value: {
              fontSize: '24px',
              color: headingColor,
              fontWeight: 500,
              offsetY: -5
            }
          }
        }
      },
      grid: {
        show: false,
        padding: {
          bottom: 5
        }
      },
      stroke: {
        lineCap: 'round'
      },
      labels: ['Progress'],
      responsive: [
        {
          breakpoint: 1442,
          options: {
            chart: {
              height: 120
            },
            plotOptions: {
              radialBar: {
                dataLabels: {
                  value: {
                    fontSize: '18px'
                  }
                },
                hollow: {
                  size: '60%'
                }
              }
            }
          }
        },
        {
          breakpoint: 1025,
          options: {
            chart: {
              height: 136
            },
            plotOptions: {
              radialBar: {
                hollow: {
                  size: '65%'
                },
                dataLabels: {
                  value: {
                    fontSize: '18px'
                  }
                }
              }
            }
          }
        },
        {
          breakpoint: 769,
          options: {
            chart: {
              height: 120
            },
            plotOptions: {
              radialBar: {
                hollow: {
                  size: '55%'
                }
              }
            }
          }
        },
        {
          breakpoint: 426,
          options: {
            chart: {
              height: 145
            },
            plotOptions: {
              radialBar: {
                hollow: {
                  size: '65%'
                }
              }
            },
            dataLabels: {
              value: {
                offsetY: 0
              }
            }
          }
        },
        {
          breakpoint: 376,
          options: {
            chart: {
              height: 105
            },
            plotOptions: {
              radialBar: {
                hollow: {
                  size: '60%'
                }
              }
            }
          }
        }
      ]
    };
  if (typeof expensesRadialChartEl !== undefined && expensesRadialChartEl !== null) {
    const expensesRadialChart = new ApexCharts(expensesRadialChartEl, expensesRadialChartConfig);
    expensesRadialChart.render();
  }

  // Profit last month Line Chart
  // --------------------------------------------------------------------
  const profitLastMonthEl = document.querySelector('#profitLastMonth'),
    profitLastMonthConfig = {
      chart: {
        height: 110,
        type: 'line',
        parentHeightOffset: 0,
        toolbar: {
          show: false
        }
      },
      grid: {
        borderColor: borderColor,
        strokeDashArray: 6,
        xaxis: {
          lines: {
            show: true,
            colors: '#000'
          }
        },
        yaxis: {
          lines: {
            show: false
          }
        },
        padding: {
          top: -18,
          left: -4,
          right: 7,
          bottom: -10
        }
      },
      colors: [config.colors.info],
      stroke: {
        width: 2
      },
      series: [
        {
          data: [0, 40, 15, 65, 40, 90]
        }
      ],
      tooltip: {
        shared: false,
        intersect: true,
        x: {
          show: false
        }
      },
      xaxis: {
        labels: {
          show: false
        },
        axisTicks: {
          show: false
        },
        axisBorder: {
          show: false
        }
      },
      yaxis: {
        labels: {
          show: false
        }
      },
      tooltip: {
        enabled: false
      },
      markers: {
        size: 3.5,
        fillColor: config.colors.info,
        strokeColors: 'transparent',
        strokeWidth: 3.2,
        offsetX: -1,
        discrete: [
          {
            seriesIndex: 0,
            dataPointIndex: 5,
            fillColor: cardColor,
            strokeColor: config.colors.info,
            size: 4.5,
            shape: 'circle'
          }
        ],
        hover: {
          size: 5.5
        }
      },
      responsive: [
        {
          breakpoint: 768,
          options: {
            chart: {
              height: 110
            }
          }
        }
      ]
    };
  if (typeof profitLastMonthEl !== undefined && profitLastMonthEl !== null) {
    const profitLastMonth = new ApexCharts(profitLastMonthEl, profitLastMonthConfig);
    profitLastMonth.render();
  }

  // Generated Leads Chart
  // --------------------------------------------------------------------
  const generatedLeadsChartEl = document.querySelector('#generatedLeadsChart'),
    generatedLeadsChartConfig = {
      chart: {
        height: 125,
        width: 120,
        parentHeightOffset: 0,
        type: 'donut'
      },
      labels: ['Electronic', 'Sports', 'Decor', 'Fashion'],
      series: [45, 58, 30, 50],
      colors: [
        chartColors.donut.series1,
        chartColors.donut.series2,
        chartColors.donut.series3,
        chartColors.donut.series4
      ],
      stroke: {
        width: 0
      },
      dataLabels: {
        enabled: false,
        formatter: function (val, opt) {
          return parseInt(val) + '%';
        }
      },
      legend: {
        show: false
      },
      tooltip: {
        theme: false
      },
      grid: {
        padding: {
          top: 15,
          right: -20,
          left: -20
        }
      },
      states: {
        hover: {
          filter: {
            type: 'none'
          }
        }
      },
      plotOptions: {
        pie: {
          donut: {
            size: '70%',
            labels: {
              show: true,
              value: {
                fontSize: '1.5rem',
                fontFamily: 'fontFamily',
                color: headingColor,
                fontWeight: 500,
                offsetY: -15,
                formatter: function (val) {
                  return parseInt(val) + '%';
                }
              },
              name: {
                offsetY: 20,
                fontFamily: 'fontFamily'
              },
              total: {
                show: true,
                showAlways: true,
                color: config.colors.success,
                fontSize: '.8125rem',
                label: 'Total',
                fontFamily: 'fontFamily',
                formatter: function (w) {
                  return '184';
                }
              }
            }
          }
        }
      },
      responsive: [
        {
          breakpoint: 1025,
          options: {
            chart: {
              height: 172,
              width: 160
            }
          }
        },
        {
          breakpoint: 769,
          options: {
            chart: {
              height: 178
            }
          }
        },
        {
          breakpoint: 426,
          options: {
            chart: {
              height: 147
            }
          }
        }
      ]
    };
  if (typeof generatedLeadsChartEl !== undefined && generatedLeadsChartEl !== null) {
    const generatedLeadsChart = new ApexCharts(generatedLeadsChartEl, generatedLeadsChartConfig);
    generatedLeadsChart.render();
  }

  // Total Revenue Report Chart - Bar Chart
  // --------------------------------------------------------------------
  const totalRevenueChartEl = document.querySelector('#totalRevenueChart'),
    totalRevenueChartOptions = {
      series: [
        {
          name: 'Earning',
          data: [270, 210, 180, 200, 250, 280, 250, 270, 150]
        },
        {
          name: 'Expense',
          data: [-140, -160, -180, -150, -100, -60, -80, -100, -180]
        }
      ],
      chart: {
        height: 413,
        parentHeightOffset: 0,
        stacked: true,
        type: 'bar',
        toolbar: { show: false }
      },
      tooltip: {
        enabled: false
      },
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: '40%',
          borderRadius: 7,
          startingShape: 'rounded',
          endingShape: 'rounded',
          borderRadiusApplication: 'around',
          borderRadiusWhenStacked: 'last'
        }
      },
      colors: [config.colors.primary, config.colors.warning],
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'smooth',
        width: 6,
        lineCap: 'round',
        colors: [cardColor]
      },
      legend: {
        show: true,
        horizontalAlign: 'right',
        position: 'top',
        fontSize: '13px',
        fontFamily: fontFamily,
        markers: {
          size: 6,
          offsetY: 0,
          shape: 'circle',
          strokeWidth: 0
        },
        labels: {
          colors: headingColor
        },
        itemMargin: {
          horizontal: 10,
          vertical: 2
        }
      },
      grid: {
        show: false,
        padding: {
          bottom: -8,
          right: 0,
          top: 20
        }
      },
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
        labels: {
          style: {
            fontSize: '13px',
            colors: labelColor,
            fontFamily: fontFamily
          }
        },
        axisTicks: {
          show: false
        },
        axisBorder: {
          show: false
        }
      },
      yaxis: {
        labels: {
          offsetX: -16,
          style: {
            fontSize: '13px',
            colors: labelColor,
            fontFamily: fontFamily
          }
        },
        min: -200,
        max: 300,
        tickAmount: 5
      },
      responsive: [
        {
          breakpoint: 1700,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '43%'
              }
            }
          }
        },
        {
          breakpoint: 1441,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '50%'
              }
            }
          }
        },
        {
          breakpoint: 1300,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '40%'
              }
            }
          }
        },
        {
          breakpoint: 991,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '38%'
              }
            }
          }
        },
        {
          breakpoint: 850,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '50%'
              }
            }
          }
        },
        {
          breakpoint: 449,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '73%'
              }
            },
            xaxis: {
              labels: {
                offsetY: -5
              }
            },
            legend: {
              show: true,
              horizontalAlign: 'right',
              position: 'top',
              itemMargin: {
                horizontal: 10,
                vertical: 0
              }
            }
          }
        },
        {
          breakpoint: 394,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '88%'
              }
            },
            legend: {
              show: true,
              horizontalAlign: 'center',
              position: 'bottom',
              markers: {
                offsetX: -3,
                offsetY: 0
              },
              itemMargin: {
                horizontal: 10,
                vertical: 5
              }
            }
          }
        }
      ],
      states: {
        hover: {
          filter: {
            type: 'none'
          }
        },
        active: {
          filter: {
            type: 'none'
          }
        }
      }
    };
  if (typeof totalRevenueChartEl !== undefined && totalRevenueChartEl !== null) {
    const totalRevenueChart = new ApexCharts(totalRevenueChartEl, totalRevenueChartOptions);
    totalRevenueChart.render();
  }

  // Total Revenue Report Budget Line Chart
  const budgetChartEl = document.querySelector('#budgetChart'),
    budgetChartOptions = {
      chart: {
        height: 100,
        toolbar: { show: false },
        zoom: { enabled: false },
        type: 'line'
      },
      series: [
        {
          name: 'Last Month',
          data: [20, 10, 30, 16, 24, 5, 40, 23, 28, 5, 30]
        },
        {
          name: 'This Month',
          data: [50, 40, 60, 46, 54, 35, 70, 53, 58, 35, 60]
        }
      ],
      stroke: {
        curve: 'smooth',
        dashArray: [5, 0],
        width: [1, 2]
      },
      legend: {
        show: false
      },
      colors: [borderColor, config.colors.primary],
      grid: {
        show: false,
        borderColor: borderColor,
        padding: {
          top: -30,
          bottom: -15,
          left: 25
        }
      },
      markers: {
        size: 0
      },
      xaxis: {
        labels: {
          show: false
        },
        axisTicks: {
          show: false
        },
        axisBorder: {
          show: false
        }
      },
      yaxis: {
        show: false
      },
      tooltip: {
        enabled: false
      }
    };
  if (typeof budgetChartEl !== undefined && budgetChartEl !== null) {
    const budgetChart = new ApexCharts(budgetChartEl, budgetChartOptions);
    budgetChart.render();
  }

  // Earning Reports Bar Chart
  // --------------------------------------------------------------------
  const reportBarChartEl = document.querySelector('#reportBarChart'),
    reportBarChartConfig = {
      chart: {
        height: 230,
        type: 'bar',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        bar: {
          barHeight: '60%',
          columnWidth: '60%',
          startingShape: 'rounded',
          endingShape: 'rounded',
          borderRadius: 4,
          distributed: true
        }
      },
      grid: {
        show: false,
        padding: {
          top: -20,
          bottom: 0,
          left: -10,
          right: -10
        }
      },
      colors: [
        config.colors_label.primary,
        config.colors_label.primary,
        config.colors_label.primary,
        config.colors_label.primary,
        config.colors.primary,
        config.colors_label.primary,
        config.colors_label.primary
      ],
      dataLabels: {
        enabled: false
      },
      series: [
        {
          data: [40, 95, 60, 45, 90, 50, 75]
        }
      ],
      legend: {
        show: false
      },
      xaxis: {
        categories: ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'],
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          style: {
            colors: labelColor,
            fontSize: '13px'
          }
        }
      },
      yaxis: {
        labels: {
          show: false
        }
      },
      responsive: [
        {
          breakpoint: 1025,
          options: {
            chart: {
              height: 190
            }
          }
        },
        {
          breakpoint: 769,
          options: {
            chart: {
              height: 250
            }
          }
        }
      ],
      states: {
        hover: {
          filter: {
            type: 'none'
          }
        },
        active: {
          filter: {
            type: 'none'
          }
        }
      }
    };
  if (typeof reportBarChartEl !== undefined && reportBarChartEl !== null) {
    const barChart = new ApexCharts(reportBarChartEl, reportBarChartConfig);
    barChart.render();
  }

  // Variable declaration for table
  const dt_invoice_table = document.querySelector('.datatable-invoice');

  // Invoice datatable
  // --------------------------------------------------------------------
  if (dt_invoice_table) {
    const dt_invoice = new DataTable(dt_invoice_table, {
      ajax: assetsPath + 'json/invoice-list.json',
      columns: [
        // columns according to JSON
        { data: 'invoice_id' },
        { data: 'invoice_id', orderable: false, render: DataTable.render.select() },
        { data: 'invoice_id' },
        { data: 'invoice_status' },
        { data: 'total' },
        { data: 'issued_date' },
        { data: 'invoice_status' },
        { data: 'action' }
      ],
      columnDefs: [
        {
          className: 'control',
          responsivePriority: 2,
          searchable: false,
          targets: 0,
          render: function () {
            return '';
          }
        },
        {
          targets: 1,
          orderable: false,
          searchable: false,
          responsivePriority: 4,
          render: function () {
            return '<input type="checkbox" class="dt-checkboxes form-check-input">';
          }
        },
        {
          targets: 2,
          render: function (data, type, full) {
            return `<a href="app-invoice-preview.html">#${full['invoice_id']}</a>`;
          }
        },
        {
          // Invoice Status with tooltip
          targets: 3,
          render: function (data, type, full) {
            const invoiceStatus = full['invoice_status'];
            const balance = full['balance'];
            const dueDate = full['due_date'];
            const roleBadgeObj = {
              Sent: '<span class="badge p-1_5 rounded-pill bg-label-secondary"><i class="icon-base icon-16px ti tabler-circle-check"></i></span>',
              Draft:
                '<span class="badge p-1_5 rounded-pill bg-label-primary"><i class="icon-base icon-16px ti tabler-device-floppy"></i></span>',
              'Past Due':
                '<span class="badge p-1_5 rounded-pill bg-label-danger"><i class="icon-base icon-16px ti tabler-info-circle"></i></span>',
              'Partial Payment':
                '<span class="badge p-1_5 rounded-pill bg-label-success"><i class="icon-base icon-16px ti tabler-circle-half-2"></i></span>',
              Paid: '<span class="badge p-1_5 rounded-pill bg-label-warning"><i class="icon-base icon-16px ti tabler-chart-pie"></i></span>',
              Downloaded:
                '<span class="badge p-1_5 rounded-pill bg-label-info"><i class="icon-base icon-16px ti tabler-arrow-down-circle"></i></span>'
            };

            // Sanitize tooltip content by escaping double quotes
            const tooltipContent = `
              ${invoiceStatus}<br>
              <span class="fw-medium">Balance:</span> ${balance}<br>
              <span class="fw-medium">Due Date:</span> ${dueDate}
            `.replace(/"/g, '&quot;');

            return `
              <span class="d-inline-block" data-bs-toggle="tooltip" data-bs-html="true" title="<span>${tooltipContent}">
                ${roleBadgeObj[invoiceStatus] || ''}
</span>
              </span>
            `;
          }
        },
        {
          targets: 4,
          render: function (data, type, full) {
            const total = full['total'];
            return `<span class="d-none">${total}</span>$${total}`;
          }
        },
        {
          targets: 5,
          render: function (data, type, full) {
            const dueDate = new Date(full['due_date']);
            return `
              <span class="d-none">${dueDate.toISOString().slice(0, 10).replace(/-/g, '')}</span>
              ${dueDate.toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' })}
            `;
          }
        },
        {
          targets: 6,
          visible: false
        },
        {
          targets: -1,
          title: 'Actions',
          searchable: false,
          orderable: false,
          render: function () {
            return (
              '<div class="d-flex align-items-center">' +
              '<a href="javascript:;" data-bs-toggle="tooltip" class="btn btn-icon delete-record" data-bs-placement="top" title="Delete"><i class="icon-base ti tabler-trash icon-md"></i></a>' +
              '<a href="app-invoice-preview.html" data-bs-toggle="tooltip" class="btn btn-icon" data-bs-placement="top" title="Preview Invoice"><i class="icon-base ti tabler-eye icon-md"></i></a>' +
              '<div class="dropdown">' +
              '<a href="javascript:;" class="btn dropdown-toggle hide-arrow btn-icon p-0" data-bs-toggle="dropdown"><i class="icon-base ti tabler-dots-vertical icon-md"></i></a>' +
              '<div class="dropdown-menu dropdown-menu-end">' +
              '<a href="javascript:;" class="dropdown-item">Download</a>' +
              '<a href="app-invoice-edit.html" class="dropdown-item">Edit</a>' +
              '<a href="javascript:;" class="dropdown-item">Duplicate</a>' +
              '</div>' +
              '</div>'
            );
          }
        }
      ],
      select: {
        style: 'multi',
        selector: 'td:nth-child(2)'
      },
      order: [[2, 'desc']],
      displayLength: 6,
      layout: {
        topStart: {
          rowClass: 'row m-3 justify-content-between',
          features: [
            {
              pageLength: {
                menu: [6, 10, 25, 50, 100],
                text: 'Show_MENU_'
              },
              buttons: [
                {
                  text: '<i class="icon-base icon-16px ti tabler-plus me-md-2"></i><span class="d-md-inline-block d-none">Create Invoice</span>',
                  className: 'btn btn-primary',
                  action: function () {
                    window.location = 'app-invoice-add.html';
                  }
                }
              ]
            }
          ]
        },
        topEnd: {
          rowClass: 'row mx-3 justify-content-between',
          features: [
            {
              search: {
                placeholder: 'Search Invoice',
                text: '_INPUT_'
              }
            }
          ]
        },
        bottomStart: {
          rowClass: 'row mx-3 justify-content-between',
          features: ['info']
        },
        bottomEnd: 'paging'
      },
      language: {
        paginate: {
          next: '<i class="icon-base ti tabler-chevron-right scaleX-n1-rtl icon-18px"></i>',
          previous: '<i class="icon-base ti tabler-chevron-left scaleX-n1-rtl icon-18px"></i>',
          first: '<i class="icon-base ti tabler-chevrons-left scaleX-n1-rtl icon-18px"></i>',
          last: '<i class="icon-base ti tabler-chevrons-right scaleX-n1-rtl icon-18px"></i>'
        }
      },
      responsive: {
        details: {
          display: DataTable.Responsive.display.modal({
            header: function (row) {
              const data = row.data();
              return 'Details of ' + data['client_name'];
            }
          }),
          type: 'column',
          renderer: function (api, rowIdx, columns) {
            const data = columns
              .map(function (col) {
                return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                  ? `<tr data-dt-row="${col.rowIndex}" data-dt-column="${col.columnIndex}">
                      <td>${col.title}:</td>
                      <td>${col.data}</td>
                    </tr>`
                  : '';
              })
              .join('');

            if (data) {
              const div = document.createElement('div');
              div.classList.add('table-responsive');
              const table = document.createElement('table');
              div.appendChild(table);
              table.classList.add('table');
              const tbody = document.createElement('tbody');
              tbody.innerHTML = data;
              table.appendChild(tbody);
              return div;
            }
            return false;
          }
        }
      },
      initComplete: function () {
        // Ensure the container for the Invoice Status filter is created
        let invoiceStatusContainer = document.querySelector('.invoice_status');
        if (!invoiceStatusContainer) {
          // Create the container if it doesn't exist
          invoiceStatusContainer = document.createElement('div');
          invoiceStatusContainer.className = 'invoice_status';

          // Append it to a suitable location in your DataTable's layout
          // Example: Appending to the filter area (adjust as needed)
          const filterArea = document.querySelector('.dt-layout-end');
          if (filterArea) {
            filterArea.appendChild(invoiceStatusContainer);
          }
        }

        // Adding role filter once the table is initialized
        this.api()
          .columns(6)
          .every(function () {
            const column = this;

            // Create the dropdown for "Invoice Status"
            const select = document.createElement('select');
            select.id = 'UserRole';
            select.className = 'form-select';
            select.innerHTML = '<option value=""> Invoice Status </option>';

            // Append the dropdown to the invoice status container
            invoiceStatusContainer.appendChild(select);

            // Add change event listener to filter the column based on selected value
            select.addEventListener('change', function () {
              const val = select.value ? `^${select.value}$` : '';
              column.search(val, true, false).draw();
            });

            // Populate the dropdown with unique values from the column data
            column
              .data()
              .unique()
              .sort()
              .each(function (d) {
                const option = document.createElement('option');
                option.value = d;
                option.className = 'text-capitalize';
                option.textContent = d;
                select.appendChild(option);
              });
          });
      }
    });
    function deleteRecord(event) {
      let row = document.querySelector('.dtr-expanded');
      if (event) {
        row = event.target.parentElement.closest('tr');
      }
      if (row) {
        dt_invoice.row(row).remove().draw();
      }
    }
    function bindDeleteEvent() {
      const invoiceTable = document.querySelector('.invoice-list-table');
      const modal = document.querySelector('.dtr-bs-modal');

      if (invoiceTable && invoiceTable.classList.contains('collapsed')) {
        if (modal) {
          modal.addEventListener('click', function (event) {
            if (event.target.parentElement.classList.contains('delete-record')) {
              deleteRecord();
              const closeButton = modal.querySelector('.btn-close');
              if (closeButton) closeButton.click(); // Simulates a click on the close button
            }
          });
        }
      } else {
        const tableBody = invoiceTable?.querySelector('tbody');
        if (tableBody) {
          tableBody.addEventListener('click', function (event) {
            if (event.target.parentElement.classList.contains('delete-record')) {
              deleteRecord(event);
            }
          });
        }
      }
    }

    // Initial event binding
    bindDeleteEvent();

    // Re-bind events when modal is shown or hidden
    document.addEventListener('show.bs.modal', function (event) {
      if (event.target.classList.contains('dtr-bs-modal')) {
        bindDeleteEvent();
      }
    });

    document.addEventListener('hide.bs.modal', function (event) {
      if (event.target.classList.contains('dtr-bs-modal')) {
        bindDeleteEvent();
      }
    });
    // On each datatable draw, initialize tooltip
    dt_invoice.on('draw', function () {
      const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
      tooltipTriggerList.forEach(tooltipTriggerEl => {
        new bootstrap.Tooltip(tooltipTriggerEl, {
          boundary: document.body
        });
      });
    });
  }

  // Filter form control to default size
  // ? setTimeout used for multilingual table initialization
  setTimeout(() => {
    const elementsToModify = [
      { selector: '.dt-buttons .btn', classToRemove: 'btn-secondary' },
      { selector: '.dt-buttons', classToRemove: 'btn-secondary' },
      { selector: '.dt-buttons.btn-group', classToAdd: 'mb-0' },
      { selector: '.dt-search .form-control', classToRemove: 'form-control-sm' },
      { selector: '.dt-length .form-select', classToRemove: 'form-select-sm' },
      { selector: '.dt-length', classToAdd: 'me-0 mb-md-6 mb-6' },
      {
        selector: '.dt-layout-end',
        classToRemove: 'justify-content-between ms-auto',
        classToAdd: 'justify-content-md-between justify-content-center d-flex flex-wrap gap-4 mb-sm-0 mb-4 mt-0'
      },
      {
        selector: '.dt-layout-start',
        classToRemove: 'd-md-flex me-auto justify-content-between',
        classToAdd: 'col-12 d-flex justify-content-center justify-content-md-start gap-2'
      },
      { selector: '.dt-layout-table', classToRemove: 'row mt-2' },
      { selector: '.dt-layout-full', classToRemove: 'col-md col-12', classToAdd: 'table-responsive' }
    ];

    // Delete record
    elementsToModify.forEach(({ selector, classToRemove, classToAdd }) => {
      document.querySelectorAll(selector).forEach(element => {
        if (classToRemove) {
          classToRemove.split(' ').forEach(className => element.classList.remove(className));
        }
        if (classToAdd) {
          classToAdd.split(' ').forEach(className => element.classList.add(className));
        }
      });
    });
  }, 100);
});
