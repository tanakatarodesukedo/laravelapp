import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Axios from 'axios';

export default class MyComponent extends Component{
    constructor(props) {
        super(props);
        this.state = {
            num: 0,
            msg: 'ok'
        };
        this.doChange = this.doChange.bind(this);
        this.doAction = this.doAction.bind(this);
    }

    doChange(event){
        const n = event.target.value;
        this.setState(() => ({
            num: n
        }));
    }

    doAction(event){
        this.setState(() => ({
            msg: 'wait...'
        }));
        axios.get(`/hello/json/${this.state.num}`).then(response => {
            const person = response.data;
            const msg = `${person.id}:${person.name} [${person.mail}] (${person.age})`;
            this.setState(() => ({
                msg: msg
            }));
        });
    }

    render(){
        return (
            <div className="container">
                <p>{this.state.msg}</p>
                <div>
                    <input type="number" id="num" onChange={this.doChange} />
                    <button onClick={this.doAction}>Click</button>
                </div>
            </div>
        );
    }
}

if (document.getElementById('mycomponent')) {
    ReactDOM.render(<MyComponent />, document.getElementById('mycomponent'));
}
