(async () =>
{
  const jwt_token = JSON.parse(atob(token.split('.')[1]))

  user_id = parseInt(jwt_token.userid, 10);
  employee_name = jwt_token.fullname;

  try
  {
    await $.ajax({
      url: API('checkToken'),
      headers: {
        Authorization: token,
      },
    });
  }
  catch (error)
  {
    sessionStorage.removeItem('sms_token');
    window.alert('Session Timeout');
    window.location.replace(baseUrl('login'));
  }
})();
