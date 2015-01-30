<?php
include("include/login_info.php");
include("include/medoo.php");
include("include/database.php");
include("include/lang.php");

?>
<html>
<head>
	<title><?php print $lang['website-title']; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include("include/script.inc"); ?>
  <link href="css/page.css" rel="stylesheet">
  <script type="text/javascript" src="js/highcharts.js"></script>
</head>
<body>
      <!--header-->
      <?php include("com/head.php"); ?>
      <!--main-->
    <!--  <div class="inner cover">
        <h1 class="cover-heading">Cover your page.</h1>
        <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
        <p class="lead"><a href="#" class="btn btn-lg btn-default">Learn more</a></p>
      </div>-->
      <div class="main-body">
      <div id="report"></div>
        <div id="pie-report"></div>
      </div>      <!--foot-->
      <?php include("com/foot.php"); ?>
      <script type="text/javascript">
      $(function () {
      $('#report').highcharts({
      chart: {
      type: 'column'
      },
      title: {
      text: '会员增长'
      },
      subtitle: {
      text: '资料来源: 马纳生活馆'
      },
      xAxis: {
      categories: [
      'Jan',
      'Feb',
      'Mar',
      'Apr',
      'May',
      'Jun',
      'Jul',
      'Aug',
      'Sep',
      'Oct',
      'Nov',
      'Dec'
      ]
      },
      yAxis: {
      min: 0,
      title: {
      text: '人数 (个)'
      }
      },
      tooltip: {
      headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
          '<td style="padding:0"><b>{point.y:.1f} 人</b></td></tr>',
        footerFormat: '</table>',
      shared: true,
      useHTML: true
      },
      plotOptions: {
      column: {
      pointPadding: 0.2,
      borderWidth: 0
      }
      },
      series: [{
      name: '会员',
      data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

      }, {
      name: '红酒会员',
      data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

      }, {
      name: '长期会员',
      data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

      } ]
      });
      });

      $(function () {
        var chart;

        $(document).ready(function () {

          // Build the chart
          $('#pie-report').highcharts({
            chart: {
              plotBackgroundColor: null,
              plotBorderWidth: null,
              plotShadow: false
            },
            title: {
              text: '马纳生活馆营业额比率, 2014'
            },
            tooltip: {
              pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
              pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                  enabled: false
                },
                showInLegend: true
              }
            },
            series: [{
              type: 'pie',
              name: '比率',
              data: [
                ['食品',   45.0],
                ['饮品',       26.8],
                {
                  name: '甜点',
                  y: 12.8,
                  sliced: true,
                  selected: true
                },
                ['酒水',    8.5],
                ['外卖',     6.2],
                ['其它',   0.7]
              ]
            }]
          });
        });

      });
      </script>
</body>
</html>