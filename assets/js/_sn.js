/*Created : Sebin Thomas
For     : Backbone Constructors, Views and the associated functions
Date    : 14/07/2016*/
/*Page included in header */

mpxd.constructors.page_info_ring = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}
mpxd.constructors.it_cs_stations = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}
mpxd.constructors.trip_cable_progress = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}
mpxd.constructors.region_progress = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}
mpxd.constructors.overall_progress = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}
mpxd.constructors.chainage_progress = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}
mpxd.constructors.overall_progress_chart = function (data) {
    var el = "#portlet_" + data.id;
    return new mpxd.modules.tw_progress_chart.overall_progress({data: data, el: el});
}


mpxd.modules.tw_progress_chart = {}
mpxd.modules.tw_progress_chart.overall_progress = Backbone.View.extend({
    initialize: function (options) {
        this.data = options.data;
        this.render();
    },render: function () {
        var that = this;
        var html = mpxd.getTemplate("overall_progress_chart");
        template = _.template(html, {data: that.data});

        that.$el.html(template);
        that.$el.find('.content').mCustomScrollbar({theme: 'rounded'});
        that.$el.find('.progress-chart-2').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: 'Overall '+that.data.data[0].data['sbk-s-06']['progress'][0][0]
            },
            xAxis: {
                categories: that.data.data[0].data['sbk-s-06']['progress'][0][1],
                //categories: [
                //    'Track Survey',
                //    'Surface Preparation',
                //    'Long Rail..',
                //    'Rail & Sleeper..',
                //    'Rebar & Form..',
                //    'Concreting',
                //    'Derailment Wall',
                //    'Welding..',
                //    'Rail Alignment',
                //    'PR Bracket..',
                //    'PR Install/Align',
                //    'PR Cover..',
                //    'Emergency..',
                //    'Cable Through &..',
                //    'Commissioning'
                //],
                crosshair: true,
                labels: {
                    rotation: -45
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Number of Months'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                },dataLabels: {
                    enabled: false,
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                    style: {
                        textShadow: '0 0 3px grey'
                    }
                }

            },
            series: [{
                name: 'Planned',
                data: that.data.data[0].data['sbk-s-06']['progress'][0][2]

            }, {
                name: 'Actual',
                data: that.data.data[0].data['sbk-s-06']['progress'][0][3]
            }]
        });
    }

});
