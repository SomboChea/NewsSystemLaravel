import axios from "axios";
import React, { Component } from "react";

class NewPost extends Component {
    constructor(props) {
        super(props);
        this.state = {
            title: "",
            description: "",
            errors: []
        };
        this.handleFieldChange = this.handleFieldChange.bind(this);
        this.handleCreateNewProject = this.handleCreateNewProject.bind(this);
        this.hasErrorFor = this.hasErrorFor.bind(this);
        this.renderErrorFor = this.renderErrorFor.bind(this);
    }

    handleFieldChange(event) {
        this.setState({
            [event.target.name]: event.target.value
        });
    }

    handlePostNews(event) {
        event.preventDefault();

        const { history } = this.props;

        const news = {
            title: this.state.title,
            description: this.state.description
        };

        axios
            .post("/api/news", news)
            .then(response => {
                // redirect to the homepage
                history.push("/");
            })
            .catch(error => {
                this.setState({
                    errors: error.response.data.errors
                });
            });
    }

    hasErrorFor(field) {
        return !!this.state.errors[field];
    }

    renderErrorFor(field) {
        if (this.hasErrorFor(field)) {
            return (
                <span className="invalid-feedback">
                    <strong>{this.state.errors[field][0]}</strong>
                </span>
            );
        }
    }

    render() {
        return (
            <div className="container py-4">
                <div className="row justify-content-center">
                    <div className="col-md-6">
                        <div className="card">
                            <div className="card-header">
                                Post a new News
                            </div>
                            <div className="card-body">
                                <form onSubmit={this.handlePostNews}>
                                    <div className="form-group">
                                        <label htmlFor="title">
                                            News Title
                                        </label>
                                        <input
                                            id="title"
                                            type="text"
                                            className={`form-control ${
                                                this.hasErrorFor("title")
                                                    ? "is-invalid"
                                                    : ""
                                            }`}
                                            name="title"
                                            value={this.state.title}
                                            onChange={this.handleFieldChange}
                                        />
                                        {this.renderErrorFor("title")}
                                    </div>
                                    <div className="form-group">
                                        <label htmlFor="description">
                                            News Description
                                        </label>
                                        <textarea
                                            id="description"
                                            className={`form-control ${
                                                this.hasErrorFor("description")
                                                    ? "is-invalid"
                                                    : ""
                                            }`}
                                            name="description"
                                            rows="10"
                                            value={this.state.description}
                                            onChange={this.handleFieldChange}
                                        />
                                        {this.renderErrorFor("description")}
                                    </div>
                                    <button className="btn btn-primary">
                                        Post
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default NewPost;
