import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter, Route } from 'react-router-dom';

import App from 'components/App';
import Home from 'components/Home';
import SignUp from 'components/SignUp';
import SignIn from 'components/SignIn';

ReactDOM.render(
  <BrowserRouter>
    <App>
      <Route path="/" exact component={Home} />
      <Route path="/signup" component={SignUp} />
      <Route path="/signin" component={SignIn} />
    </App>
  </BrowserRouter>,
  document.getElementById('root')
);
