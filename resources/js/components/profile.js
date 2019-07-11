import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Profile extends Component {
    render() {
        return (
            <div>
                <h2>
                    
                </h2>
                <p>
                    email: 
                </p>
                <a href="javascript:openChangePassword();">
                    <p>
                        change password
                </p>
                </a>
                <p>
                    posts: 
                </p>
                <p>
                    comments: 
                </p>
            </div>
        )
    }
}

if (document.getElementById('profile-container')) {
    ReactDOM.render(<Profile />, document.getElementById('profile-container'));
}
