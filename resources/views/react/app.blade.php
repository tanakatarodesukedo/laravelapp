<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>React</title>
  <script src="https://unpkg.com/react@16/umd/react.development.js"></script>
  <script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script>
  <script src="https://unpkg.com/babel-standalone@6/babel.js"></script>
  <script src="{{asset('js/jquery-3.5.0.min.js')}}"></script>
</head>

<body>
  <h1>React</h1>
  <div id="root">wait...</div>
  <script type="text/babel">
    const dom = document.querySelector('#root');

    const table = {
      fontSize: '16pt',
      padding: '5px 50px'
    };
    const th = {
      color: 'white',
      backgroundColor: '#006',
      padding: '5px 15px'
    };
    const td = {
      color: 'black',
      padding: '5px 15px',
      border: '1px solid gray'
    };

    const data = [
      {name: 'Taro', mail:'taro@yamada', age:45},
      {name: 'Hanako', mail:'hanako@flower', age:37},
      {name: 'Sachiko', mail:'sachiko@happy', age:29}
    ];

    const el = (
      <div>
        <table style={table}>
          <tr>
            <th style={th}>name</th>
            <th style={th}>mail</th>
            <th style={th}>age</th>
          </tr>
          {data.map((value) => (
            <tr>
              <td style={td}>{value.name}</td>
              <td style={td}>{value.mail}</td>
              <td style={td}>{value.age}</td>
            </tr>
          ))}
        </table>
      </div>
    );
    
    ReactDOM.render(el, dom);
  </script>
</body>

</html>