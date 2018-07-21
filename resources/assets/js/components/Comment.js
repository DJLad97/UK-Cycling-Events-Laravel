import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Comment extends Component {
  render() {
	return (
		<form>
			<div className="form-group">
				<label htmlFor="comment">Leave a comment</label>
				<textarea className="form-control" name="comment" id="comment"/>
				<input type="submit" value="Post Comment" className="btn btn-success"/>
			</div>
		</form>
	)
  }
}

ReactDOM.render(
	<Comment />,
	document.getElementById('comments')
);
