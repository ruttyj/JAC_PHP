<!--
You are free to copy and use this sample in accordance with the terms of the
Apache license (http://www.apache.org/licenses/LICENSE-2.0.html)
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>Google Visualization API Sample</title>
  <script type="text/javascript" src="//www.google.com/jsapi"></script>
  <script type="text/javascript">
    {literal}google.load('visualization', '1', {packages: ['motionchart']});{/literal}

    function drawVisualization() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Fruit');
      data.addColumn('date', 'Date');
      data.addColumn('number', 'Sales');
      data.addColumn('number', 'Expenses');
      data.addColumn('string', 'Location');
      data.addRows([
        ['Apples', new Date(1988,0,1), 1000, 300, 'East'],
        ['Oranges', new Date(1988,0,1), 950, 200, 'West'],
        ['Bananas', new Date(1988,0,1), 300, 250, 'West'],
        ['Apples', new Date(1988,1,1), 1200, 400, 'East'],
        ['Oranges', new Date(1988,1,1), 900, 150, 'West'],
        ['Bananas', new Date(1988,1,1), 788, 617, 'West']
      ]);
    
      var motionchart = new google.visualization.MotionChart(
          document.getElementById('visualization'));
      {literal}motionchart.draw(data, {'width': 800, 'height': 400});{/literal}
    }
    

    google.setOnLoadCallback(drawVisualization);
  </script>
</head>
<body style="font-family: Arial;border: 0 none;">
<div id="visualization" style="width: 800px; height: 400px;"></div>
</body>
</html>
​