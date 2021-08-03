const functions = require("firebase-functions");
const express = require('express');
const { response } = require("express");

const app = express();

app.set('view engine', 'ejs')
app.use(express.static(__dirname + '/views'));
app.get('/home', (req, res) => {
    res.render('index');
});
app.get('/signup/success', (req, res) => {
    res.render('success');
});
app.get('/signup/fail', (req, res) => {
    res.render('failed');
});
app.get('/game/space', (req, res) => {
    res.render('Unity/Space/index');
});
app.get('/game/rock', (req, res) => {
    res.render('Unity/Rcok/index');
});
app.get('/game/race', (req, res) => {
    res.render('Unity/Race/index');
});
exports.app = functions.https.onRequest(app);