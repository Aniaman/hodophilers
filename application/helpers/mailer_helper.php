<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (!function_exists('forgotPasswordMail')) {
  function forgotPasswordMail()
  {
    $message = '<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link
          rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
          crossorigin="anonymous"
        />
      </head>
      <body>
        <div class="row">
          <div class="col-lg-12">
            <table
              class="body-wrap"
              style="
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                box-sizing: border-box;
                font-size: 14px;
                width: 100%;
                background-color: transparent;
                margin: 0;
              "
              bgcolor="transparent"
            >
              <tr
                style="
                  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                  box-sizing: border-box;
                  font-size: 14px;
                  margin: 0;
                "
              >
                <td
                  style="
                    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                    box-sizing: border-box;
                    font-size: 14px;
                    vertical-align: top;
                    margin: 0;
                  "
                  valign="top"
                ></td>
                <td
                  class="container"
                  width="600"
                  style="
                    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                    box-sizing: border-box;
                    font-size: 14px;
                    vertical-align: top;
                    display: block !important;
                    max-width: 600px !important;
                    clear: both !important;
                    margin: 0 auto;
                  "
                  valign="top"
                >
                  <div
                    class="content"
                    style="
                      font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                      box-sizing: border-box;
                      font-size: 14px;
                      max-width: 600px;
                      display: block;
                      margin: 0 auto;
                      padding: 20px;
                    "
                  >
                    <table
                      class="main"
                      width="100%"
                      cellpadding="0"
                      cellspacing="0"
                      itemprop="action"
                      itemscope
                      itemtype="http://schema.org/ConfirmAction"
                      style="
                        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                        box-sizing: border-box;
                        font-size: 14px;
                        border-radius: 3px;
                        background-color: transparent;
                        margin: 0;
                        border: 1px dashed #4d79f6;
                      "
                      bgcolor="#fff"
                    >
                      <tr
                        style="
                          font-family: "Helvetica Neue", Helvetica, Arial,
                            sans-serif;
                          box-sizing: border-box;
                          font-size: 14px;
                          margin: 0;
                        "
                      >
                        <td
                          class="content-wrap"
                          style="
                            font-family: "Helvetica Neue", Helvetica, Arial,
                              sans-serif;
                            box-sizing: border-box;
                            font-size: 14px;
                            vertical-align: top;
                            margin: 0;
                            padding: 20px;
                          "
                          valign="top"
                        >
                          <meta
                            itemprop="name"
                            content="Confirm Email"
                            style="
                              font-family: "Helvetica Neue", Helvetica, Arial,
                                sans-serif;
                              box-sizing: border-box;
                              font-size: 14px;
                              margin: 0;
                            "
                          />
                          <table
                            width="100%"
                            cellpadding="0"
                            cellspacing="0"
                            style="
                              font-family: "Helvetica Neue", Helvetica, Arial,
                                sans-serif;
                              box-sizing: border-box;
                              font-size: 14px;
                              margin: 0;
                            "
                          >
                            <tr>
                              <td>
                                <a href="#"
                                  ><img
                                    src="assets/images/logo-sm.png"
                                    alt=""
                                    style="
                                      margin-left: auto;
                                      margin-right: auto;
                                      display: block;
                                      margin-bottom: 10px;
                                      height: 40px;
                                    "
                                /></a>
                              </td>
                            </tr>
                            <tr
                              style="
                                font-family: "Helvetica Neue", Helvetica, Arial,
                                  sans-serif;
                                box-sizing: border-box;
                                font-size: 14px;
                                margin: 0;
                              "
                            >
                              <td
                                class="content-block"
                                style="
                                  font-family: "Helvetica Neue", Helvetica, Arial,
                                    sans-serif;
                                  box-sizing: border-box;
                                  color: #4d79f6;
                                  font-size: 24px;
                                  font-weight: 700;
                                  text-align: center;
                                  vertical-align: top;
                                  margin: 0;
                                  padding: 0 0 10px;
                                "
                                valign="top"
                              >
                                Welcome To Hodophilers
                              </td>
                            </tr>
                            <tr
                              style="
                                font-family: "Helvetica Neue", Helvetica, Arial,
                                  sans-serif;
                                box-sizing: border-box;
                                font-size: 14px;
                                margin: 0;
                              "
                            >
                              <td
                                class="content-block"
                                style="
                                  font-family: "Helvetica Neue", Helvetica, Arial,
                                    sans-serif;
                                  box-sizing: border-box;
                                  color: #3f5db3;
                                  font-size: 14px;
                                  vertical-align: top;
                                  margin: 0;
                                  padding: 10px 10px;
                                "
                                valign="top"
                              >
                                Hello Admin.
                              </td>
                            </tr>
                            <tr
                              style="
                                font-family: "Helvetica Neue", Helvetica, Arial,
                                  sans-serif;
                                box-sizing: border-box;
                                font-size: 14px;
                                margin: 0;
                              "
                            >
                              <td
                                class="content-block"
                                style="
                                  font-family: "Helvetica Neue", Helvetica, Arial,
                                    sans-serif;
                                  box-sizing: border-box;
                                  font-size: 14px;
                                  vertical-align: top;
                                  margin: 0;
                                  padding: 10px 10px;
                                "
                                valign="top"
                              >
                                We have sent you this email in response to your
                                request to reset your password on Hodophilers.
                              </td>
                            </tr>
                            <tr
                              style="
                                font-family: "Helvetica Neue", Helvetica, Arial,
                                  sans-serif;
                                box-sizing: border-box;
                                font-size: 14px;
                                margin: 0;
                              "
                            >
                              <td
                                class="content-block"
                                style="
                                  font-family: "Helvetica Neue", Helvetica, Arial,
                                    sans-serif;
                                  box-sizing: border-box;
                                  font-size: 14px;
                                  vertical-align: top;
                                  margin: 0;
                                  padding: 10px 10px;
                                "
                                valign="top"
                              >
                                To reset your password, please follow the link
                                below:.
                              </td>
                            </tr>
                            <tr
                              style="
                                font-family: "Helvetica Neue", Helvetica, Arial,
                                  sans-serif;
                                box-sizing: border-box;
                                font-size: 14px;
                                margin: 0;
                              "
                            >
                              <td
                                class="content-block"
                                itemprop="handler"
                                itemscope
                                itemtype="http://schema.org/HttpActionHandler"
                                style="
                                  font-family: "Helvetica Neue", Helvetica, Arial,
                                    sans-serif;
                                  box-sizing: border-box;
                                  font-size: 14px;
                                  vertical-align: top;
                                  margin: 0;
                                  padding: 10px 10px;
                                "
                                valign="top"
                              >
                                <a
                                  href="#"
                                  class="btn-primary"
                                  style="
                                    font-size: 14px;
                                    text-decoration: none;
                                    line-height: 2em;
                                    font-weight: bold;
                                    text-align: center;
                                    cursor: pointer;
                                    display: block;
                                    border-radius: 5px;
                                    text-transform: capitalize;
                                    border: none;
                                    padding: 10px 20px;
                                  "
                                  >Reset Password</a
                                >
                              </td>
                            </tr>
                            <tr
                              style="
                                font-family: "Helvetica Neue", Helvetica, Arial,
                                  sans-serif;
                                box-sizing: border-box;
                                font-size: 14px;
                                margin: 0;
                              "
                            >
                              <td
                                class="content-block"
                                style="
                                  font-family: "Helvetica Neue", Helvetica, Arial,
                                    sans-serif;
                                  box-sizing: border-box;
                                  font-size: 14px;
                                  padding-top: 5px;
                                  vertical-align: top;
                                  margin: 0;
                                  text-align: right;
                                "
                                valign="top"
                              >
                                &mdash; <b>Hodophilers</b>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                    <!--end table-->
                  </div>
                  <!--end content-->
                </td>
                <td
                  style="
                    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                    box-sizing: border-box;
                    font-size: 14px;
                    vertical-align: top;
                    margin: 0;
                  "
                  valign="top"
                ></td>
              </tr>
            </table>
            <!--end table-->
          </div>
          <!--end col-->
        </div>
      </body>
    </html>
    ';
  }
}
