import React, { Component } from 'react';
import { Link } from 'react-router-dom';

class Header extends Component {
  renderLinks() {
    return (
      <div>
        <Link to="/signup">Sign Up</Link>
        <Link to="/signin">Sign In</Link>
      </div>
    );
  }

  render() {
    return (
      <div className="header">
        {this.renderLinks()}
      </div>
    );
  }
}

export default Header;
