import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {hot} from 'react-hot-loader';

export default class Example extends Component {
    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Hello</div>
                            <div className="card-body">I'm an ReactJS Component!</div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}


if (document.getElementById('example')) {   
    ReactDOM.render(hot(module)(<Example />), document.getElementById('example'));
}
