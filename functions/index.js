const functions = require("firebase-functions");
const express = require('express');
const { response } = require("express");

const app = express();

app.get('/',(req,res)=>{
    response.send(`${Date.now()}`);
});
 exports.app = functions.https.onRequest(app);