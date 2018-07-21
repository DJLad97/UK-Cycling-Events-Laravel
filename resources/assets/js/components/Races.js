import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Races extends Component {

  constructor(props) {
      super(props);
      this.state = {
          races: []
      }
  }

  componentDidMount() {
      fetch('/mtbRaces')
          .then(response => {
              return response.json();
          })
          .then(races => {
              this.setState({ races });
          });
  }

  renderRaces(){
      return this.state.races.map(race => {
          return (
              <ul>
                  <li key={race.id}>{race.raceName}</li>
              </ul>
          )
      })
  }

  render() {
      return (
          <div>
              {this.renderRaces()}
          </div>
      )
  }
}

ReactDOM.render(<Races />, document.getElementById('races'));