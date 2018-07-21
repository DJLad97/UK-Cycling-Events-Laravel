import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Welcome extends Component{
  render(){
    return <h1>Hello, {this.props.name}</h1>
  }
}

function App(){
  return (
    <div>
      <Welcome name="Test"></Welcome>
      <Welcome name="Test 2"></Welcome>
      <Welcome name="Test 3"></Welcome>
    </div>
  )
}

ReactDOM.render(
  <App />,
  document.getElementById('root')
);


// class Example extends Component {
//     render() {
//         return (
//             <div>
//             </div>
//         )
//     }
// }

// export default Example;

// // We only want to try to render our component on pages that have a div with an ID
// // of "example"; otherwise, we will see an error in our console 
// if (document.getElementById('example')) {
//     ReactDOM.render(<Example />, document.getElementById('example'));
// }