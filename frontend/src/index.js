import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter, Route } from 'react-router-dom';

import App from 'components/App';
import Home from 'components/Home';
import Signup from 'components/Signup';

ReactDOM.render(
  <BrowserRouter>
    <App>
      <Route path="/" exact component={Home} />
      <Route path="/signup" component={Signup} />
    </App>
  </BrowserRouter>,
  document.getElementById('root')
);
