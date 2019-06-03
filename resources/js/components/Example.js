import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Example extends Component {
    render() {
        return (
            <div>
                <ul id="social">
                    <li className="mb-2"><img className="social-media background mr-1" src="https://image.flaticon.com/icons/svg/174/174848.svg" alt="" /><a href="#">facebook</a></li>
                    <li className="mb-2"><img className="social-media background mr-1" src="https://image.flaticon.com/icons/svg/174/174855.svg" alt="" /><a href="#">instagram</a></li>
                    <li className="mb-2"><img className="social-media mr-1" src="https://image.flaticon.com/icons/svg/174/174876.svg" alt="" /><a href="#">twitter</a></li>
                </ul>
            </div>
        );
    }
}


if (document.getElementById('social-container')) {
    ReactDOM.render(<Example />, document.getElementById('social-container'));
}
