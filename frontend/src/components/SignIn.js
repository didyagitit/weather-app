import React, { Component } from 'react';
import { Redirect } from 'react-router-dom';
import axios from 'axios';
import * as settings from 'settings';

class SignIn extends Component {
  constructor() {
    super();
    this.state = { email: '', password: '', signUpWithSuccess: false };

    this.onSubmit = this.onSubmit.bind(this);
    this.onChange = this.onChange.bind(this);
  }

  onChange(event) {
    const name = event.target.name;

    this.setState({
      [name]: event.target.value
    });
  }

  onSubmit(event) {
    event.preventDefault();

    axios.post(`${settings.API_HOST}${settings.USER_CREATE_URL}`, {
      email: this.state.email,
      password: this.state.password
    }).then(response => {
      if (response.data.status === 201) {
        this.setState({ signUpWithSuccess: true });
      }
    });
  }

  render() {
    if (this.state.signUpWithSuccess) {
      return (
        <Redirect to="/" />
      );
    }

    return (
      <form onSubmit={this.onSubmit}>
        <div>
          <label>Email</label>
          <input
            name="email"
            type="text"
            onChange={this.onChange}/>
        </div>
        <div>
          <label>Password</label>
          <input
            name="password"
            type="password"
            onChange={this.onChange} />
        </div>
        <div>
          <input type="submit" value="Sign Up" />
        </div>
      </form>
    );
  }
}

export default SignIn;
